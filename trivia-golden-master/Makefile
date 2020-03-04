default:
	@printf "$$HELP"

# Local commands
run:
	php ./src/GameRunner.php

# Docker commands
docker-run:
	@docker run -v ${PWD}:/opt/project -w /opt/project php:7.2 make run
define HELP
# Local commands
	- make run\t\tRun the code
# Docker commands
	- make docker-run\t\tRun the program on docker
 Please execute "make <command>". Example make help

endef

export HELP