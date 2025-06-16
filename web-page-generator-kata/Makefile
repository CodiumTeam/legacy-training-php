UID:=$(shell id -u)
GID:=$(shell id -g)
PWD:=$(shell pwd)
DOCKER_RUN_CMD:=docker run -t --rm -v $(PWD):/code -u $(UID):$(GID) codiumteam/legacy-training-php
default: docker-run

vendor:
	composer install

.PHONY: run
run: vendor
	php bin/console web:generate

.PHONY: docker-run
docker-run:
	@$(DOCKER_RUN_CMD) make run

.PHONY: docker-update
docker-update:
	@$(DOCKER_RUN_CMD) composer update
