DOCKER_COMPOSE_COMMAND=docker compose
PHP_BACKEND=$(DOCKER_COMPOSE_COMMAND) exec -u 1000 cag-php-backend
PHP_EXEC=$(PHP_BACKEND) php84 -d memory_limit=1G -dxdebug.mode=off
PHP_EXEC_DEBUG=$(DOCKER_COMPOSE_COMMAND) php -d memory_limit=1G

build:
	@$(DOCKER_COMPOSE_COMMAND) build

up:
	@$(DOCKER_COMPOSE_COMMAND) up -d --remove-orphans

down:
	@$(DOCKER_COMPOSE_COMMAND) down --remove-orphans

shell:
	@$(DOCKER_COMPOSE_COMMAND) exec -u 1000 -it cag-php-backend sh

analyze-code:
	@$(PHP_EXEC) vendor/bin/phpstan analyse --memory-limit 1G

fix-style:
	@PHP_CS_FIXER_IGNORE_ENV=1 $(PHP_EXEC) vendor/bin/php-cs-fixer --show-progress=dots -v fix

code-setup:
	make analyze-code
	make fix-style

restart:
	make down
	make up

composer-dump-autoload:
	make cache-clear-force
	@$(PHP_EXEC) composer dump-autoload --classmap-authoritative

composer-install:
	@$(PHP_EXEC) composer install --optimize-autoloader --apcu-autoloader

composer-update:
	@$(PHP_EXEC) composer update --optimize-autoloader --apcu-autoloader
