FROM php:8.0-fpm

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -qq wget libgd3 libgd-dev libwebp-dev libpq-dev libmagickwand-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev nghttp2 libhiredis-dev libmemcached-dev pkg-config zlib1g-dev librdkafka-dev && \
    wget http://pear.php.net/go-pear.phar && \
    php go-pear.phar && \
    docker-php-ext-install -j$(nproc) iconv && \
    docker-php-ext-configure gd --with-webp --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql zip bcmath && \
    pecl install imagick && \
    pecl install swoole && \
    pecl install memcached && \
    pecl install rdkafka && \
    docker-php-ext-enable imagick opcache sodium swoole memcached rdkafka

ADD ./config/php.ini /usr/local/etc/php/conf.d/php.ini
ADD ./config/php-fpm.conf /usr/local/etc/php-fpm.d/zzz-magicLAMP.conf