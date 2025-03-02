ARG PHPFPM_VERSION
FROM php:${PHPFPM_VERSION}-fpm

COPY ./php.ini /usr/local/etc/php/

# BASE
RUN apt -y update
RUN apt install -y zip unzip libxrender1 libfontconfig libxext-dev libzip-dev libicu-dev redis-tools default-mysql-client
RUN docker-php-ext-install pdo_mysql zip intl

# PDF
RUN mkdir /root/.fonts
COPY fonts/ipaexg.ttf /usr/share/fonts/ipaexg.ttf
COPY fonts/ipaexm.ttf /usr/share/fonts/ipaexm.ttf

# GD
RUN apt install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libjpeg-dev
RUN docker-php-ext-configure gd --with-freetype=/usr/include --with-jpeg=/usr/include
RUN docker-php-ext-install -j$(nproc) gd

# COMPOSER
ARG COMPOSER_VERSION
RUN curl -sS https://getcomposer.org/installer | php -- --version=${COMPOSER_VERSION}
RUN mv composer.phar /usr/bin/composer

# NODE
ARG NODEJS_VERSION_MAJOR
RUN curl -fsSL https://deb.nodesource.com/setup_${NODEJS_VERSION_MAJOR} | bash -
RUN apt install -y nodejs
RUN rm -rf /var/lib/apt/lists/

# REDIS
RUN pecl install redis
RUN docker-php-ext-enable redis

# USER
RUN groupadd -g 1000 user && useradd -m -s /bin/bash -u 1000 -g 1000 user
USER user

EXPOSE 5173

WORKDIR /var/www/vhosts