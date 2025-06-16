UID:=$(shell id -u)
GID:=$(shell id -g)
PWD:=$(shell pwd)
DOCKER_RUN_CMD:=docker run --rm -v $(PWD):/code -u $(UID):$(GID) codiumteam/legacy-training-php
default: docker-run

# Local commands
vendor:
	composer install

.PHONY: run
run: vendor
	composer run test

# Docker commands
.PHONY: docker-run
docker-run:
	@$(DOCKER_RUN_CMD) make run

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:webpage-generator composer update

.PHONY: docker-dependencies
docker-composer-install:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:webpage-generator make dependencies
