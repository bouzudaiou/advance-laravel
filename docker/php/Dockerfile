FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/

# Install PHP extensions and system dependencies
RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip curl gnupg2 \
    && docker-php-ext-install pdo_mysql zip

# Install Node.js 18 LTS
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

WORKDIR /var/www
