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
	composer run test -- --coverage-html coverage
	@printf "\nOpen coverage/index.html to see the code coverage\n"

.PHONY: mutations
mutations:
	./vendor/bin/infection
	@printf "\nOpen './infection.log' to see the mutations\n"

# Docker commands
.PHONY: docker-tests
docker-tests:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization make tests

.PHONY: docker-coverage
docker-coverage:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization make coverage

.PHONY: docker-mutations
docker-mutations:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization make mutations

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:gilded-rose-characterization -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization composer update

.PHONY: docker-dependencies
docker-composer-install:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization make dependencies

