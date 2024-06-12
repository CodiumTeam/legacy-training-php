default: docker-tests

# Local commands
.PHONY: dependencies
dependencies:
	composer install
.PHONY: tests
tests:
	./vendor/bin/phpunit
.PHONY: coverage
coverage:
	./vendor/bin/phpunit --coverage-text

# Docker commands
.PHONY: docker-tests
docker-tests:
	@docker run --rm -v ${PWD}:/code -v /code/vendor codiumteam/legacy-training-php:print-date make tests
.PHONY: docker-coverage
docker-coverage:
	@docker run --rm -v ${PWD}:/code -v /code/vendor codiumteam/legacy-training-php:print-date make coverage

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:print-date -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:print-date composer update

.PHONY: docker-dependencies
docker-composer-install:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:print-date make dependencies
