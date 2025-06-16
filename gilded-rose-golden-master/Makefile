UID:=$(shell id -u)
GID:=$(shell id -g)
PWD:=$(shell pwd)
DOCKER_RUN_CMD:=docker run -t --rm -v $(PWD):/code -u $(UID):$(GID) codiumteam/legacy-training-php
default: docker-run

# Local commands
vendor:
	composer install

.PHONY: run
run: vendor
	php ./src/Main.php

# Docker commands
.PHONY: docker-run
docker-run:
	@$(DOCKER_RUN_CMD) make run

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	@$(DOCKER_RUN_CMD) composer update
