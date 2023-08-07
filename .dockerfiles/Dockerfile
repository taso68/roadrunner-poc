FROM php:8.2-apache-buster


USER root

WORKDIR /var/www/html


RUN apt-get update && apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libmagick++-dev \
        libmagickwand-dev \
        zlib1g-dev \
        apt-utils \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
        libtool \
        make \
        gcc \
        protobuf-compiler \
    && docker-php-ext-configure gd --with-freetype --with-jpeg=/usr/include/ --enable-gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && pecl bundle -d /usr/src/php/ext redis \
    && rm /usr/src/php/ext/redis-*.tgz \
    && docker-php-ext-install redis \
    && docker-php-ext-install soap \
    && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache \
    && docker-php-source delete \
    && pecl install grpc \
    && docker-php-ext-enable grpc \
    && pecl install protobuf \
    && docker-php-ext-install sockets

# install node js
RUN curl -fsSL https://deb.nodesource.com/setup_17.x | bash -
RUN apt-get install -y nodejs
RUN mkdir /root/.npm
RUN chmod -R 777 /root/.npm

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cleanup
RUN apt-get clean

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

WORKDIR /var/www/html
EXPOSE 80
EXPOSE 443
