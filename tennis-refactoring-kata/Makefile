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

# Docker commands
docker-build:
	docker build -t codiumteam/legacy-training-php:tennis-refactoring -f ../Dockerfile .


docker-tests:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:tennis-refactoring make tests
docker-coverage:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:tennis-refactoring make coverage

define HELP
# Local commands
	- make dependencies\tInstall the dependencies using composer
	- make tests\t\tRun the tests
	- make coverage\t\tRun the code coverage
# Docker commands
	- make docker-build\tCreates a PHP image with xdebug and install the dependencies
	- make docker-tests\tRun the tests on docker
	- make docker-coverage\tRun the code coverage
 Please execute "make <command>". Example make help

endef

export HELP
