FROM php:8.2-fpm
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apt-get update &&  apt-get upgrade -y &&  apt-get install -y git
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-configure zip \
  && docker-php-ext-install zip bcmath
RUN apt-get install -y libpng-dev libwebp-dev libjpeg62-turbo-dev libfreetype6-dev
RUN docker-php-ext-install -j$(nproc) gd

RUN apt-get -y update \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

RUN apt-get install sqlite3 -y

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN apt-get install xdg-utils -y

ENV XDEBUG_MODE=coverage

WORKDIR /opt/projects
