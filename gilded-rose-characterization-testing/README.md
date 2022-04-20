# Gilded Rose characterization testing

## Description:
This kata has a legacy code to practice writing unit tests and characterization tests.

There is an example test to simplify writing the first test.

You can to run the test with coverage in order to know if all the paths have been executed.

You can to run [Infection](https://github.com/infection/infection) mutation testing in order to know if all the boundaries have been ensured.

# Business requirements
We don’t know the requirements :(

## Goals:
- Write unit tests that validate the business requirements
- Use the characterization test technique 
- Use the code coverage to identify the Backstage passes requirements and try to reach 100% coverage.
- As code coverage is not enough, use mutation testing to find extra requirements writing new tests.

## Run the kata
On Linux and Mac

    make

in Windows using docker

    docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:gilded-rose-characterization make

## Inspired by:
https://github.com/emilybache/GildedRose-Refactoring-Kata/

Emily Bache @emilybache
