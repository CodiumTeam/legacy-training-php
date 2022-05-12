default: docker-run

help:
	@printf "$$HELP"

# Local commands
dependencies:
	composer install
run:
	php ./src/GameRunner.php

# Docker commands

docker-build:
	docker build -t codiumteam/legacy-training-php:trivia-golden-master -f ../Dockerfile .

docker-run:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:trivia-golden-master make run
define HELP
# Local commands
	- make run\t\tRun the code
# Docker commands
	- make docker-run\t\tRun the program on docker
 Please execute "make <command>". Example make help

endef

.PHONY: docker-tests
docker-tests:
	 docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:trivia-golden-master make run > current.log && diff current.log golden.log

export HELP
