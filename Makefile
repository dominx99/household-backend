compose_file := "docker-compose.yml"
duty_php_service := "php_duties"
current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
duty-bin-location := "./apps/household/backend/bin"
duty-console-location := "./apps/household/backend/bin/console"

# 🐳 Docker Compose
.PHONY: up
up: CMD=up --build -d

.PHONY: stop
stop: CMD=stop

.PHONY: destroy
destroy: CMD=down

.PHONY: build
build: deps up

.PHONY: deps
deps: composer-install

.PHONY: composer
composer dump composer-install composer-update composer-require composer-require-module: composer-env-file
	@docker run --rm $(INTERACTIVE) --volume $(current-dir):/app --user $(id -u):$(id -g) \
		composer:2 $(CMD) \
			--no-ansi

.PHONY: dump
dump: CMD=dump-autoload

.PHONY: composer-install
composer-install: CMD=install

.PHONY: composer-update
composer-update: CMD=update

.PHONY: composer-require
composer-require: CMD=require
composer-require: INTERACTIVE=-ti --interactive

.PHONY: composer-require-module
composer-require-module: CMD=require $(module)
composer-require-module: INTERACTIVE=-ti --interactive

# Usage: `make doco CMD="ps --services"`
# Usage: `make doco CMD="build --parallel --pull --force-rm --no-cache"`
.PHONY: doco
doco up stop destroy: composer-env-file
	@docker-compose $(CMD)

.PHONY: rebuild
rebuild: composer-env-file
	docker-compose build --pull --force-rm --no-cache
	make deps
	make up

# 🐘 Composer
composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

fix:
	@docker-compose exec $(duty_php_service) php vendor/bin/php-cs-fixer fix apps/household/backend/src
	@docker-compose exec $(duty_php_service) php vendor/bin/php-cs-fixer fix src
	@docker-compose exec $(duty_php_service) php vendor/bin/php-cs-fixer fix tests

clear:
	@docker-compose exec $(duty_php_service) php $(duty-console-location) cache:clear

.PHONY: test
test: composer-env-file
	docker-compose exec $(duty_php_service) php $(duty-bin-location)/phpunit

test-coverage:
	@docker-compose -f $(compose_file) exec $(duty_php_service) sh -c "php bin/phpunit --coverage-html .coverage $(CMD)"
	@brave ".coverage/index.html"

migrate:
	@docker-compose exec $(duty_php_service) php $(duty-console-location) doctrine:migrations:migrate

diff:
	@docker-compose exec $(duty_php_service) php $(duty-console-location) doctrine:migrations:diff

.PHONY: static-analysis
static-analysis: composer-env-file
	docker-compose exec $(duty_php_service) ./vendor/bin/psalm $(CMD)
