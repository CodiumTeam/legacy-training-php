default:
	@printf "$$HELP"

# Local commands
dependencies:
	composer dump-autoload
run:
	php ./src/Main.php

# Docker commands
docker-build:
	docker build -t codiumteam/legacy-training-php:gilded-rose-golden-master -f ../Dockerfile .
docker-run:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-golden-master make run
define HELP
# Local commands
	- make dependencies\tInstall the dependencies.
	- make run\t\tRun the code
# Docker commands
	- make docker-build\tInstall the dependencies using docker.
	- make docker-run\tRun the program on docker
 Please execute "make <command>". Example make help

endef

export HELP
