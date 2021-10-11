FROM php:8.0-fpm

RUN apt update \
  && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
  && docker-php-ext-install intl opcache pdo pdo_mysql \
  && pecl install apcu \
  && docker-php-ext-enable apcu \
  && docker-php-ext-configure zip \
  && docker-php-ext-install zip

WORKDIR /var/www/symfony_docker

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

# set proper user
RUN usermod -u 1000 www-data
RUN usermod -G 100 www-data
RUN chown -R www-data:www-data /var/www/

USER www-data

RUN git config --global user.email "mates.marian.n@gmail.com" \
  && git config --global user.name "Mates Marian"