default: docker-run

# Local commands
.PHONY: dependencies
dependencies:
	composer install

.PHONY: run
run:
	composer run test
	@printf "Open html/users.html\n"

# Docker commands
.PHONY: docker-run
docker-run:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:webpage-generator make run

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:webpage-generator -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:webpage-generator composer update

.PHONY: docker-dependencies
docker-composer-install:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:webpage-generator make dependencies
