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
	./vendor/bin/phpunit --coverage-html coverage
	@printf "\nOpen coverage/index.html to see the code coverage\n"

.PHONY: mutations
mutations:
	./vendor/bin/infection
	@printf "\nOpen infection.log to see the mutations\n"

# Docker commands
.PHONY: docker-tests
docker-tests:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization make tests

.PHONY: docker-coverage
docker-coverage:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization make coverage

.PHONY: docker-mutations
docker-mutations:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization phpdbg -qrr ./vendor/bin/infection

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:gilded-rose-characterization -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization composer update

