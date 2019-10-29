# Weather kata
We cannot control the weather but we can predict it.

This kata has a code that request the weather prediction from Metaweather.

## Goal
- Test coupled code.
- Remove the external dependency when testing in order to make the tests repeatable and fast

# Pre requisites
    PHP 7.1 

or 

    docker
    
# Run the tests locally
Install dependencies with [composer](https://getcomposer.org):

	make install

Run the tests

	make tests
	
# Run the tests on docker container
Install dependencies with composer:

    make docker-install
	
Run the tests

	make docker-tests
	
## Authors
Luis Rovirosa [@luisrovirosa](https://www.twitter.com/luisrovirosa)

Jordi Anguela [@jordianguela](https://www.twitter.com/jordianguela)

[Original repository](https://github.com/CodiumTeam/weather-kata)
	