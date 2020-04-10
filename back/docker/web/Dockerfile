FROM php:7.4-apache
RUN apt-get update \
    && apt-get install -y zlib1g-dev libicu-dev g++ git unzip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && a2enmod rewrite
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=. --filename=composer \
    && mv composer /usr/local/bin/
COPY 000-default.conf /etc/apache2/sites-available/
