# Makefile for setting up and running server

build:
	@make check

	@make doctrine_database
	@make migrate
	@make run

run:
	symfony server:start

migration:
	php bin/console make:migration

migrate:
	php bin/console doctrine:migrations:migrate

doctrine_database:
	php bin/console doctrine:database:create

mysql:
	docker-compose up -d

check:
	symfony check:requirements

info:
	php bin/console about

mysql_port:
	lsof -t -i:3306
