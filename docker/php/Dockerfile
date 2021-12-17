FROM php:8.0.0-fpm-alpine
ENV TZ=Europe/Paris
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apk --update --no-cache add git bash
RUN docker-php-ext-install pdo_mysql
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
CMD composer install ; composer update ; php-fpm ; npm install
RUN chown -R root:www-data .
RUN chmod 777 -R .
EXPOSE 9000