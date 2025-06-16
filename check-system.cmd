@echo off

CALL :validateDocker
CALL :validateKata web-page-generator-kata web-page-generator "make run"
CALL :validateKata tennis-refactoring-kata tennis-refactoring "make tests"
CALL :validateKata user-registration-refactoring-kata user-registration "make tests"
CALL :validateKata gilded-rose-characterization-testsing gilded-rose-characterization "make tests"
CALL :validateKata weather-kata weather-kata "make tests"
CALL :validateKata trip-service-kata trip-service "make tests"
CALL :validateKata trivia-golden-master trivia-golden-master "make run"
CALL :validateKata print-date print-date "make tests"

goto :eof

:validateKata
    echo Validating %1...
    pushd %1
    docker run --rm -v %CD%:/code codiumteam/legacy-training-php %~3
    popd
goto :eof

:validateDocker
    echo Validating docker running...
    docker ps >NUL: 2>NUL:
    IF ERRORLEVEL 1 (
      echo Error
      echo Are you sure that you have docker running?
      goto :eof
    ) else (
      echo "Ok"
    )

    echo Downloading docker image...
    docker pull codiumteam/legacy-training-php >NUL: 2>NUL:
    IF ERRORLEVEL 1 (
      echo Error
      echo There is a problem downloading the docker image
      goto :eof
    ) else (
      echo Ok
    )

    echo Validating docker mount permissions...
    docker run --rm -v "%CD%":/code codiumteam/legacy-training-php ls >NUL: 2>NUL:
    IF ERRORLEVEL 1 (
      echo Error
      echo Are you sure that you have permissions to mount your volumes?
      goto :eof
    ) else (
      echo Ok
    )
goto :eof

