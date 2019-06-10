default:
	@printf "$$HELP"

# Local commands
dependencies:
	composer install
run:
	php ./src/GameRunner.php

# Docker commands
docker-run:
	@docker run -v $(shell pwd):/opt/project -w /opt/project php:7.2 make run
define HELP
# Local commands
	- make run\t\tRun the code
# Docker commands
	- make docker-run\tRun the program on docker
 Please execute "make <command>". Example make help

endef

export HELP