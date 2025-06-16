UID:=$(shell id -u)
GID:=$(shell id -g)
PWD:=$(shell pwd)
DOCKER_RUN_CMD:=docker run -t --rm -v $(PWD):/code -u $(UID):$(GID) codiumteam/legacy-training-php
default: docker-run

vendor:
	composer install

.PHONY: run
run: vendor
	php ./src/GameRunner.php

.PHONY: tests
tests: vendor
	composer run test

# Docker commands
.PHONY: docker-run
docker-run:
	@$(DOCKER_RUN_CMD) make run

.PHONY: docker-tests
docker-tests:
	@$(DOCKER_RUN_CMD) make tests
