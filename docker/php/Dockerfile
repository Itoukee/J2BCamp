FROM php:8.0.0-fpm-alpine
RUN apk --update --no-cache add git bash
RUN docker-php-ext-install pdo_mysql
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
CMD composer install ; php-fpm
RUN chown -R www-data:www-data /var/www
EXPOSE 9000