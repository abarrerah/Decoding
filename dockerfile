FROM php:8.1.7-apache-buster
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
WORKDIR /var/www/html
# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

EXPOSE 8