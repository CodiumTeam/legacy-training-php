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
	docker build -t codiumteam/legacy-training-php:user-registration -f ../Dockerfile .

docker-tests:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:user-registration make tests
docker-coverage:
	@docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:user-registration make coverage

define HELP
# Local commands
	- make dependencies\t\tInstall the dependencies using composer
	- make tests\t\t\tRun the tests
# Docker commands
	- make docker-build\t\tCreates a PHP image with xdebug and install the dependencies
	- make docker-tests\t\tRun the tests on docker
# Extra commands (not required for the training)
	- make coverage\t\t\tRun the code coverage
	- make docker-coverage\t\tRun the code coverage
 Please execute "make <command>". Example make help

endef

export HELP
