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
.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:tennis-refactoring -f ../Dockerfile .

.PHONY: docker-tests
docker-tests:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:tennis-refactoring make tests

.PHONY: docker-coverage
docker-coverage:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:tennis-refactoring make coverage

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:tennis-refactoring composer update
