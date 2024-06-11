default: docker-run

# Local commands
.PHONY: dependencies
dependencies:
	composer dump-autoload
.PHONY: run
run:
	php ./src/Main.php

# Docker commands
.PHONY: docker-run
docker-run:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-golden-master make run

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php:gilded-rose-golden-master -f ../Dockerfile .

.PHONY: docker-update-composer-lock
docker-update-composer-lock:
	docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-golden-master composer update
