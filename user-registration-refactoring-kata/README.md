# Goal
Identify the different responsibilities and couplings.

1. Identify the coupling with the Framework and decouple from it. 
2. Identify the couplings with infrastructure and libraries and decouple from it.

## Install the dependencies

using PHP installed locally

    make dependencies

or within docker

    make docker-build

## Run the tests

using PHP installed locally

    make tests

or within docker

    make docker-tests

## To Run the application

This code is a full app you can run it and use it.

    make server-start
    
or

    make docker-server-start

    
## To run a request 
    make request
          
## Authors
Luis Rovirosa [@luisrovirosa](https://www.twitter.com/luisrovirosa)

Jordi Anguela [@jordianguela](https://www.twitter.com/jordianguela)
