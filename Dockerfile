FROM php:8.1.10-fpm-alpine

RUN apk add --no-cache \
    curl \
    git \
    vim \
    mc

# RUN curl -sS https://getcomposer.org/installer | php -- --quiet
# RUN mv composer.phar /usr/local/bin/composer
# RUN chmod +x /usr/local/bin/composer
COPY . /var/www/html

WORKDIR /var/www/html

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

# COPY . /var/www/html

# WORKDIR /var/www/html

ENV PATH=$PATH:/usr/local/bin

EXPOSE 8080
# EXPOSE 8000
CMD ["php-fpm"]