FROM php:7.3-fpm

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq libpq-dev libmagickwand-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql

RUN pecl install imagick

RUN docker-php-ext-enable imagick