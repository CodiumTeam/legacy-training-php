default: docker-run

help:
	@printf "$$HELP"

# Local commands
dependencies:
	composer install
run:
	php bin/console web:generate
	@printf "Open html/users.html\n"

# Docker commands
docker-build:
	docker build -t codiumteam/legacy-training-php:webpage-generator -f ../Dockerfile .

docker-run:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:webpage-generator make run

define HELP
# Local commands
	- make dependencies\tInstall the dependencies using composer
	- make run\t\tRun the webpage generator
# Docker commands
	- make docker-build\tCreates a PHP image with xdebug and install the dependencies
	- make docker-run\tRun the code on docker
 Please execute "make <command>". Example make help

endef

export HELP
