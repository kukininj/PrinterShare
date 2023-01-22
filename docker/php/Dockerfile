FROM php:fpm

RUN pecl install xdebug \
RUN docker-php-ext-enable xdebug

# Copy the application code
COPY . /app

VOLUME ["/app"]