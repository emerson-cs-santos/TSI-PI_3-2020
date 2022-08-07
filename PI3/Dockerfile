# FROM php:7.4-fpm-alpine

FROM php:7.3-apache

# 1. development packages
RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libzip-dev \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++

#RUN docker-php-ext-install pdo pdo_mysql sockets
#RUN curl -sS https://getcomposer.org/installer​ | php -- \
     #--install-dir=/usr/local/bin --filename=composer~

# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install

# FROM alpine
# RUN apk add --no-cache git
# CMD ["git","--version"]

#  RUN apt-get update && \
#      apt-get upgrade -y && \
#      apt-get install -y git
