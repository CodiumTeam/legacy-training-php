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
server-start:
	php bin/console server:run 0.0.0.0
request:
	curl -X POST 'http://localhost:8000/users?email=info@codium.team&name=Luis%20Rovirosa&password=validPassword1234_'
	@printf "\n"

# Docker commands
docker-build:
	docker build -t php-docker-bootstrap .
	@docker run --rm -v ${PWD}:/opt/project php-docker-bootstrap make dependencies
docker-tests:
	@docker run --rm -v ${PWD}:/opt/project php-docker-bootstrap make tests
docker-coverage:
	@docker run --rm -v ${PWD}:/opt/project php-docker-bootstrap make coverage
docker-server-start:
	@docker run --rm -i -v ${PWD}:/opt/project -p 8000:8000 php-docker-bootstrap make server-start

define HELP
# Local commands
	- make dependencies\t\tInstall the dependencies using composer
	- make tests\t\t\tRun the tests
# Docker commands
	- make docker-build\t\tCreates a PHP image with xdebug and install the dependencies
	- make docker-tests\t\tRun the tests on docker
# Extra commands (not required for the training)
	- make coverage\t\t\tRun the code coverage
	- make server-start\t\tTo start the webserver
	- make request\t\t\tMake an HTTP request to the server registering a user
	- make docker-coverage\t\tRun the code coverage
	- make docker-server-start\tTo start the webserver on docker
 Please execute "make <command>". Example make help

endef

export HELP
