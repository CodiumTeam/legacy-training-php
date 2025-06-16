UID:=$(shell id -u)
GID:=$(shell id -g)
PWD:=$(shell pwd)
DOCKER_RUN_CMD:=docker run -t --rm -v $(PWD):/code -u $(UID):$(GID) codiumteam/legacy-training-php
default: docker-tests

vendor: composer.lock
	composer install
	@touch vendor

.PHONY: tests
tests: vendor
	composer run test

.PHONY: coverage
coverage: vendor
	composer run test -- --coverage-html coverage
	@printf "\nOpen coverage/index.html to see the code coverage\n"

.PHONY: mutations
mutations: vendor
	./vendor/bin/infection
	@printf "\nOpen './infection.log' to see the mutations\n"

.PHONY: docker-tests
docker-tests:
	@$(DOCKER_RUN_CMD) make tests

.PHONY: docker-coverage
docker-coverage:
	@$(DOCKER_RUN_CMD) make coverage

.PHONY: docker-mutations
docker-mutations:
	@$(DOCKER_RUN_CMD) make mutations
