# To check if Makefile has correct syntax (all must be tabs (^I), no spaces)
# cat -e -t -v Makefile

default:
	@printf "$$HELP"

# Dependencies
dependencies:
	composer install
docker-dependencies:
	docker run -v ${PWD}:/opt/project -w /opt/project composer make dependencies

# Tests
.PHONY: tests
tests:
	./vendor/bin/phpunit
docker-tests:
	docker run -v ${PWD}:/opt/project -w /opt/project php:7.2 make tests

# Complexity
complexity:
	./vendor/bin/phpmetrics src/
docker-complexity:
	docker run -v ${PWD}:/opt/project -w /opt/project php:7.2 make complexity

define HELP
# Local commands
	- make dependencies\tInstall the dependencies using composer
	- make tests\t\tRun the tests
# Docker commands
	- make docker-dependencies\tInstall the dependencies
	- make docker-tests\t\tRun the tests on docker
# Extra commando (not required for the training
	- make complexity\t\tCalculate code complexity
	- make docker-complexity\tCalculate code complexity on docker
 Please execute "make <command>". Example make help

endef

export HELP