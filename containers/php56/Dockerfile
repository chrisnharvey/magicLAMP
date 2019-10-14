FROM php:5.6-fpm

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq libpq-dev 

RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql