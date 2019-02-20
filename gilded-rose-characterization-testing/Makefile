default:
	@printf "$$HELP"

# Local commands
dependencies:
	composer install
.PHONY: tests
tests:
	./vendor/bin/phpunit
coverage:
	./vendor/bin/phpunit --coverage-text
mutants:
	./vendor/bin/infection

# Docker commands
docker-build:
	docker build -t php-docker-bootstrap .
	@docker run -v $(shell pwd):/opt/project php-docker-bootstrap make dependencies

docker-tests:
	@docker run -v $(shell pwd):/opt/project php-docker-bootstrap make tests
docker-coverage:
	@docker run -v $(shell pwd):/opt/project php-docker-bootstrap make coverage
docker-mutants:
	@docker run -v $(shell pwd):/opt/project php-docker-bootstrap make mutants
define HELP
# Local commands
	- make dependencies\tInstall the dependencies using composer
	- make tests\t\tRun the tests
	- make coverage\t\tRun the code coverage
	- make mutants\t\tRun the infection mutant testing
# Docker commands
	- make docker-build\tCreates a PHP image with xdebug and install the dependencies
	- make docker-tests\tRun the tests on docker
	- make docker-coverage\tRun the code coverage on docker
	- make docker-mutants\t\tRun the infection mutant testing on docker
 Please execute "make <command>". Example make help

endef

export HELP