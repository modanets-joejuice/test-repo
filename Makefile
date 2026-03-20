CONTAINER_NAME=test-repo
USER_ID=$(shell id -u)
GROUP_ID=$(shell id -g)

export MYSQL_ROOT_PASSWORD ?= root
export MYSQL_DATABASE ?= app

build:
	docker compose build

up:
	docker compose up -d

down:
	docker compose down

install:
	docker compose exec app composer install --no-interaction --prefer-dist

bash:
	docker compose exec -u $(USER_ID):$(GROUP_ID) app bash

test:
	docker compose exec app vendor/bin/phpunit
