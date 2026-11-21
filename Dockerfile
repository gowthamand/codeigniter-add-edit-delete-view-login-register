# CodeIgniter 3.1.9 targets PHP 7.x; PHP 8.2+ floods deprecation warnings.
FROM php:7.4-apache

# PECL no longer serves packages to the PHP 7.4 image's old installer,
# so build phpredis 5.3.7 (supports PHP 7.4) from its GitHub release source.
ARG PHPREDIS_VERSION=5.3.7
RUN mkdir -p /usr/src/php/ext/redis \
 && curl -fsSL "https://github.com/phpredis/phpredis/archive/refs/tags/${PHPREDIS_VERSION}.tar.gz" \
    | tar xz -C /usr/src/php/ext/redis --strip-components=1 \
 && docker-php-ext-install redis \
 && a2enmod rewrite \
 && sed -ri 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

WORKDIR /var/www/html
COPY . .
RUN chown -R www-data:www-data application/cache application/logs

EXPOSE 80
