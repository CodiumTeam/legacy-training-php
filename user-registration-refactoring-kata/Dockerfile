FROM php:7.4

MAINTAINER Codium <info@codium.team>

# Composer and dependencies
RUN apt-get update && \
    apt-get install git unzip -y
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN pecl install xdebug-2.9.2 && docker-php-ext-enable xdebug

# Volume to have access to the source code
VOLUME ["/code"]

WORKDIR /code

COPY composer.* /code/
RUN composer install
