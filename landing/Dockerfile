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





