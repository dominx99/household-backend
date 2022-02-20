compose_file := "docker-compose.yml"
household-php-service := "php_household"
current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
household-bin-location := "./apps/household/backend/bin"
household-console-location := "./apps/household/backend/bin/console"

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
	@docker-compose exec $(household-php-service) php vendor/bin/php-cs-fixer fix apps/household/backend/src
	@docker-compose exec $(household-php-service) php vendor/bin/php-cs-fixer fix src
	@docker-compose exec $(household-php-service) php vendor/bin/php-cs-fixer fix tests

clear:
	@sudo rm -rf ./apps/*/*/var
	@docker-compose exec $(household-php-service) php $(household-console-location) cache:warmup

.PHONY: test
test: composer-env-file
	docker-compose exec $(household-php-service) php $(household-bin-location)/phpunit

test-household th: composer-env-file
	docker-compose exec $(household-php-service) php $(household-bin-location)/phpunit --testsuite household

test-shared ts: composer-env-file
	docker-compose exec $(household-php-service) php $(household-bin-location)/phpunit --testsuite shared

.PHONY: run-tests
run-tests: composer-env-file
	mkdir -p build/test_results/phpunit
	./vendor/bin/phpunit --exclude-group='disabled' --log-junit build/test_results/phpunit/junit.xml --testsuite household
	./vendor/bin/phpunit --exclude-group='disabled' --log-junit build/test_results/phpunit/junit.xml --testsuite shared

test-coverage tc:
	@docker-compose -f $(compose_file) exec $(household-php-service) $(household-bin-location)/phpunit --coverage-html .coverage $(CMD)
	@brave ".coverage/index.html"

migrate:
	@docker-compose exec $(household-php-service) php $(household-console-location) doctrine:migrations:migrate

diff:
	@docker-compose exec $(household-php-service) php $(household-console-location) doctrine:migrations:diff

.PHONY: static-analysis
static-analysis: composer-env-file
	docker-compose exec $(household-php-service) ./vendor/bin/psalm $(CMD)
