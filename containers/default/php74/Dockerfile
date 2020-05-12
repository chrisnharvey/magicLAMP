FROM php:7.4-fpm

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq libpq-dev libmagickwand-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev nghttp2 libhiredis-dev

RUN docker-php-ext-install -j$(nproc) iconv
RUN docker-php-ext-configure gd
RUN docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql zip bcmath

RUN pecl install imagick
RUN pecl install swoole --enable-sockets --enable-openssl --enable-http2 --enable-async-redis --enable-timewheel --enable-mysqlnd --enable-ringbuffer

RUN docker-php-ext-enable imagick opcache sodium swoole

ADD ./config/php.ini /usr/local/etc/php/conf.d/php.ini
ADD ./config/php-fpm.conf /usr/local/etc/php-fpm.d/zzz-magicLAMP.conf