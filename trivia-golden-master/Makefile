default: docker-run
# Local commands
.PHONY: dependencies
dependencies:
	composer install
.PHONY: run
run:
	@php ./src/GameRunner.php
.PHONY: tests
tests:
	composer run test

# Docker commands
.PHONY: docker-run
docker-run:
	@docker run --rm -v ${PWD}:/code -v /code/vendor codiumteam/legacy-training-php:trivia-golden-master make run

.PHONY: docker-tests
docker-tests:
	docker run --rm -v ${PWD}:/code -v /code/vendor codiumteam/legacy-training-php:trivia-golden-master make tests

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:trivia-golden-master -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:trivia-golden-master composer update

.PHONY: docker-dependencies
docker-composer-install:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:trivia-golden-master make dependencies
