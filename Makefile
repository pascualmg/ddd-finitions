UID=$(shell id -u)
GID=$(shell id -g)
DOCKER_PHP_SERVICE='php'

start: erase cache-folders build composer-install up
erase:
		docker-compose down -v
build:
		docker-compose build && \
		docker-compose pull
cache-folders:
		mkdir -p ~/.composer && chown ${UID}:${GID} ~/.composer
composer-install:
		docker-compose run --rm -u ${UID}:${GID} ${DOCKER_PHP_SERVICE} composer install
up:
		docker-compose up -d
stop:
		docker-compose stop
down: ## alias stop
		make stop
bash:
		docker-compose run --rm -u ${UID}:${GID} ${DOCKER_PHP_SERVICE} sh
root:
		docker-compose run --rm -u 0:0 ${DOCKER_PHP_SERVICE} sh
logs:
		docker-compose logs -f ${DOCKER_PHP_SERVICE}
test_unit:
	    docker-compose exec --user ${UID} ${DOCKER_PHP_SERVICE} vendor/bin/phpunit
test_unit_coverage:
	docker-compose exec --user ${UID}:${GID} ${DOCKER_PHP_SERVICE} vendor/bin/phpunit --coverage-text