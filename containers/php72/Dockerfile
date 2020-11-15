FROM php:7.2-fpm

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -qq libpq-dev libmagickwand-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev nghttp2 libhiredis-dev libmemcached-dev pkg-config zlib1g-dev && \
    docker-php-ext-install -j$(nproc) iconv && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql zip bcmath && \
    pecl install imagick && \
    pecl install swoole && \
    pecl install memcached && \
    docker-php-ext-enable imagick opcache sodium swoole memcached

ADD ./config/php.ini /usr/local/etc/php/conf.d/php.ini
ADD ./config/php-fpm.conf /usr/local/etc/php-fpm.d/zzz-magicLAMP.conf