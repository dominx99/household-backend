FROM php:8.1.1-fpm-alpine

RUN apk --update upgrade \
    && apk add --no-cache autoconf automake make gcc g++ bash icu-dev libzip-dev rabbitmq-c rabbitmq-c-dev \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        opcache \
        intl \
        zip \
        pdo_mysql

WORKDIR /application
