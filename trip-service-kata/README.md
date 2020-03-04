# Trip Service Kata

## Goals:
- How to break pain code in order to test it.
- Practice: 
  - Extract and override
  - Extract interface
  - Parametrize constructor
  - Introduce static setter 

## Run the kata
On Linux and Mac

    make

in Windows using docker

    docker run -v ${PWD}:/opt/project php-docker-bootstrap make

## Description:
This kata simulates a social network of trips.

There are some couplings inside the [TripService](./src/TripService.php) that we need to use the dependency-breaking techniques that we have learned.

We want to be able to test TripService and when we have good test coverage we will refactor to improve the code design.

We only can change TripService class.


## Original source code from:
https://github.com/sandromancuso/trip-service-kata

Sandro Mancuso @sandromancuso
