FROM php:8.4-cli

LABEL org.opencontainers.image.authors="info@codium.team"

# Composer and dependencies
RUN apt-get update && \
    apt-get install git unzip -y
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN pecl install xdebug-3.4.4 && docker-php-ext-enable xdebug
RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ENV COMPOSER_VENDOR_DIR=/vendor
WORKDIR /code

RUN --mount=type=bind,source=composer.json,target=composer.json \
    --mount=type=bind,source=composer.lock,target=composer.lock \
    composer install

COPY . .

# Volume to have access to the source code
VOLUME ["/code"]
