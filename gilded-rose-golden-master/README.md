# Gilded Rose Golden master

## Description:
This kata has a legacy code to practice writing a Golden Master piece.

Write your code inside the src/Main.php

# Business requirements
You don't need the business requirements.

## Goals:
- Write a code to generate an output that you need to be sure the code behaviour does not change.
- Write an script to automate the test execution.

## Install the dependencies
**Locally**

    make dependencies
or

    composer dump-autoload

**Docker**

    make docker-build

## Run the tests

**Locally** with PHP 7 on Linux and Mac

    make run
**Docker**

on **Linux and Mac**

    make docker-run

on **Windows**

    docker run -v %cd%:/opt/project php-docker-bootstrap make run

## Inspired by:
https://github.com/emilybache/GildedRose-Refactoring-Kata/

Emily Bache @emilybache
