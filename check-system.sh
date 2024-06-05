#!/bin/bash
ERROR=""
OUTPUT=""
function printStatus() {
  if [ $? -ne 0 ]; then
    echo "Error"
    ERROR="${ERROR} \n\n${OUTPUT}"
  else
    echo "Ok"
  fi
}

function validateKata() {
    echo -n "Validating $1..."
    OUTPUT=$($2 2>&1 && $3 2>&1 && $4 2>&1)
    printStatus
}

function validateDocker() {
    echo -n "Validating docker running..."
    (docker ps) > /dev/null
    if [ $? -ne 0 ]; then
      echo "Error"
      echo "Are you sure that you have docker running?"
      exit -1
    else
      echo "Ok"
    fi

    echo -n "Validating docker mount permissions..."
    (docker run --rm -v ${PWD}:/code codiumteam/legacy-training-php:webpage-generator ls) > /dev/null
    if [ $? -ne 0 ]; then
      echo "Error"
      echo "Are you sure that you have permissions to mount your volumes?"
      exit -1
    else
      echo "Ok"
    fi
}

validateDocker

validateKata "run web page generator kata" "cd web-page-generator-kata" "make"
validateKata "run tennis" "cd tennis-refactoring-kata" "make"
validateKata "run user registration" "cd user-registration-refactoring-kata" "make"
validateKata "run weather kata" "cd weather-kata" "make"
validateKata "run trip service" "cd trip-service-kata" "make"
validateKata "run gilded rose golden master" "cd gilded-rose-golden-master" "make"
validateKata "run trivia golden master" "cd trivia-golden-master" "make"
validateKata "run print date" "cd print-date" "make"

if [ -z "$ERROR" ]; then
  echo "Congratulations! You are ready for the training!"
else
  echo -e "----------------------------------------------------------\n\n$ERROR"
  echo -e "\n\nPlease send an email with the problem you have to info@codium.team\n"
fi
