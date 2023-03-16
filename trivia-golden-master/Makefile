default: docker-run
# Local commands
.PHONY: dependencies
dependencies:
	composer install
.PHONY: run
run:
	php ./src/GameRunner.php
.PHONY: tests
tests:
	./vendor/bin/phpunit

# Docker commands

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:trivia-golden-master -f ../Dockerfile .

.PHONY: docker-run
docker-run:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:trivia-golden-master make run

.PHONY: docker-tests
docker-tests:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:trivia-golden-master make tests