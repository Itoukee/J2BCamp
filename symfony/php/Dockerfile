# on étend la derniere image de php-apache
FROM php:8.0-apache
# on nomme le serveur web apache
RUN echo "j2b localhost" >> /etc/apache2/apache2.conf

# on installe les paquets qui pourront être utile pour le build
RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev;
# on met à jour les locales de localisation pour avoir le français et l'anglais
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen
# on installe composer et on le déplace dans le bin pour y avoir accès de manière globale
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

# on configure les extensions php pour integrer docker et tout ce qui utile
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl
RUN pecl install apcu && docker-php-ext-enable apcu

WORKDIR /var/www/