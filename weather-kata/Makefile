default: docker-tests

.PHONY: dependencies
dependencies:
	composer install

.PHONY: tests
tests:
	./vendor/bin/phpunit

.PHONY: coverage
coverage:
	./vendor/bin/phpunit --coverage-html coverage
	@printf "\nOpen coverage/index.html to see the code coverage\n"



.PHONY: docker-tests
docker-tests:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:weather make tests

.PHONY: docker-coverage
docker-coverage:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:weather make coverage

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:weather -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:weather composer update
