default: docker-tests

# Local commands
.PHONY: dependencies
dependencies:
	composer install
.PHONY: tests
tests:
	composer run test
.PHONY: coverage
coverage:
	composer run test -- --coverage-text

# Docker commands

.PHONY: docker-tests
docker-tests:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:user-registration make tests

.PHONY: docker-coverage
docker-coverage:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:user-registration make coverage

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:user-registration -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:user-registration composer update

.PHONY: docker-dependencies
docker-composer-install:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:user-registration make dependencies
