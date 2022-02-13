compose_file := "docker-compose.yml"
php_service := "php_duties"
current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

# 🐳 Docker Compose
.PHONY: start
start: CMD=up --build -d

.PHONY: stop
stop: CMD=stop

.PHONY: destroy
destroy: CMD=down

.PHONY: build
build: deps start

.PHONY: deps
deps: composer-install

.PHONY: composer
composer composer-install composer-update composer-require composer-require-module: composer-env-file
	@docker run --rm $(INTERACTIVE) --volume $(current-dir):/app --user $(id -u):$(id -g) \
		composer:2 $(CMD) \
			--no-ansi

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
doco start stop destroy: composer-env-file
	@docker-compose $(CMD)

.PHONY: rebuild
rebuild: composer-env-file
	docker-compose build --pull --force-rm --no-cache
	make deps
	make start

# 🐘 Composer
composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

fix:
	@docker-compose exec $(php_service) php vendor/bin/php-cs-fixer fix src
	@docker-compose exec $(php_service) php vendor/bin/php-cs-fixer fix framework
	@docker-compose exec $(php_service) php vendor/bin/php-cs-fixer fix tests

clear:
	@docker-compose exec $(php_service) php bin/console cache:clear

tt:
	@docker-compose exec $(php_service) php bin/phpunit

ttc:
	@docker-compose -f $(compose_file) exec $(php_service) sh -c "php bin/phpunit --coverage-html .coverage $(CMD)"
	@brave ".coverage/index.html"

migrate:
	@docker-compose exec $(php_service) php bin/console doctrine:migrations:migrate

diff:
	@docker-compose exec $(php_service) php bin/console doctrine:migrations:diff
