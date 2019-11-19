FROM php:7.2-fpm

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq libpq-dev libmagickwand-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev

RUN docker-php-ext-install -j$(nproc) iconv
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql zip bcmath

RUN pecl install imagick

RUN docker-php-ext-enable imagick opcache sodium

ADD php-fpm.d/magicLAMP.conf /usr/local/etc/php-fpm.d/magicLAMP.conf
