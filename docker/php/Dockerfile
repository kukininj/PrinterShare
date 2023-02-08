FROM php:fpm

RUN pecl install xdebug \
RUN docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Copy the application code
COPY . /app

VOLUME ["/app"]