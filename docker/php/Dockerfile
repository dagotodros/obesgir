ARG composer_version
ARG php_version

FROM composer:${composer_version} as vendor

FROM php:${php_version}-fpm

COPY --from=vendor /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    git \
    libxml2-dev \
    libonig-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libbz2-dev \
    libldap2-dev \
    libxslt-dev \
    libaio-dev \
    nodejs \
    npm

# Установка ICU библиотек
RUN apt-get update && apt-get install -y libicu-dev && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install -j$(nproc) gd \
		&& docker-php-ext-install bcmath \
    	&& docker-php-ext-install pdo_mysql \
    	&& docker-php-ext-install pdo_pgsql \
    	&& docker-php-ext-install soap \
        && docker-php-ext-install intl \
        && docker-php-ext-install zip \
        && docker-php-ext-install bz2 \
        && docker-php-ext-install calendar \
        && docker-php-ext-install dba \
        && docker-php-ext-install exif \
        && docker-php-ext-install gettext \
        && docker-php-ext-configure ldap --with-libdir=lib/$(uname -m)-linux-gnu \
        && docker-php-ext-install ldap \
        && docker-php-ext-install sockets \
        && docker-php-ext-install xsl \
        && mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Настройки PHP для загрузки файлов
RUN echo "upload_max_filesize = 10M" >> /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size = 50M" >> /usr/local/etc/php/conf.d/uploads.ini

ARG uid
ARG gid
ARG user

RUN if ! getent group ${gid} > /dev/null 2>&1; then groupadd -g ${gid} ${user}; fi

RUN if ! getent passwd ${uid} > /dev/null 2>&1; then useradd -u ${uid} -g ${gid} -d /home/${user} -M ${user}; fi

RUN mkdir -p /home/${user} \
    && chown -R ${uid}:${gid} /home/${user}

WORKDIR /var/www/html/

USER ${uid}:${gid}
