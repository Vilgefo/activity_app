#FROM node:16.14 as node
#WORKDIR /var/www
#COPY ./package.json /var/www/package.json
#RUN npm install --only=production


FROM php:8.1.1-apache as main

WORKDIR /var/www
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN docker-php-ext-install -j$(nproc) pdo_mysql
RUN apt-get update && apt-get install -y \
    build-essential \
    locales \
    git \
    unzip \
    zip \
    curl
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

RUN apt-get install -y nodejs
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
RUN apt-get install zip
USER www
COPY --chown=www:www ./ /var/www/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer









#FROM php:8.1.1-apache as main
#
#WORKDIR /var/www
#
#RUN docker-php-ext-install -j$(nproc) pdo_mysql
#RUN apt-get update && apt-get install -y \
#    build-essential \
#    locales \
#    git \
#    unzip \
#    zip \
#    curl
#RUN groupadd -g 1000 www
#RUN useradd -u ${uid} -ms /bin/bash -g www www
#RUN apt-get install zip
#RUN chown -R www:www /var/www
#USER www
#COPY --chown=www:www ./ /var/www/
#COPY --chown=www:www --from=composer:latest /usr/bin/composer/ /usr/bin/composer/
#RUN composer install --prefer-dist
#COPY --chown=www:www --from=node /var/www/node_modules/ ./node_modules/
#RUN ls -la
#






