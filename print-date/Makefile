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
	docker build -t codiumteam/legacy-training-php:print-date -f ../Dockerfile .

docker-tests:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:print-date make tests
docker-coverage:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:print-date make coverage

define HELP
# Local commands
	- make dependencies\tInstall the dependencies using composer
	- make tests\t\tRun the tests
# Docker commands
	- make docker-build\tCreates a PHP image with xdebug and install the dependencies
	- make docker-tests\tRun the tests on docker
# Extra command (not required for the training)
	- make coverage\t\tRun the code coverage
	- make docker-coverage\tRun the code coverage

 Please execute "make <command>". Example make help

endef

export HELP
