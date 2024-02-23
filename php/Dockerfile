FROM php:fpm-alpine

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install pdo pdo_mysql