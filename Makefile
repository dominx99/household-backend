compose_file := "docker-compose.yml"
php_service := "php_duties"

up:
	@docker-compose up -d

down:
	@docker-compose down

build:
	@docker-compose build

upd:
	@docker-compose up -d --build

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
