default:
	@printf "$$HELP"

# Local commands
dependencies:
	composer dump-autoload
run:
	php ./src/Main.php

# Docker commands
docker-build:
	docker build -t php-docker-bootstrap .
	@docker run -v ${PWD}:/opt/project php-docker-bootstrap make dependencies
docker-run:
	@docker run -v ${PWD}:/opt/project -w /opt/project php-docker-bootstrap make run
define HELP
# Local commands
	- make run\t\tRun the code
# Docker commands
	- make docker-run\tRun the program on docker
 Please execute "make <command>". Example make help

endef

export HELP