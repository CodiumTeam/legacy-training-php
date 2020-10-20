default:
	@printf "$$HELP"

# Local commands
dependencies:
	composer install
.PHONY: tests
tests:
	./vendor/bin/phpunit
.PHONY: coverage
coverage:
	./vendor/bin/phpunit --coverage-html coverage
	@printf "\nOpen coverage/index.html to see the code coverage\n"
mutations:
	./vendor/bin/infection
	@printf "\nOpen infection.log to see the mutations\n"

# Docker commands
docker-build:
	docker build -t php-docker-bootstrap .
	@docker run --rm -v ${PWD}:/opt/project php-docker-bootstrap make dependencies

docker-tests:
	@docker run --rm -v ${PWD}:/opt/project php-docker-bootstrap make tests
docker-coverage:
	@docker run --rm -v ${PWD}:/opt/project php-docker-bootstrap make coverage
docker-mutations:
	@docker run --rm -v ${PWD}:/opt/project php-docker-bootstrap phpdbg -qrr ./vendor/bin/infection
define HELP
# Local commands
	- make dependencies\tInstall the dependencies using composer
	- make tests\t\tRun the tests
	- make coverage\t\tRun the code coverage
	- make mutations\t\tRun the infection mutation testing
# Docker commands
	- make docker-build\tCreates a PHP image with xdebug and install the dependencies
	- make docker-tests\tRun the tests on docker
	- make docker-coverage\tRun the code coverage on docker
	- make docker-mutations\t\tRun the infection mutation testing on docker
 Please execute "make <command>". Example make help

endef

export HELP
