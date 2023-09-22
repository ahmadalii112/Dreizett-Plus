FROM php:8.1.23-fpm

# set main params
ENV APP_HOME /var/www/html
ENV HOST_UID=1000
ENV HOST_GID=1000
ENV USERNAME=www-data

# install all the dependencies and enable PHP modules
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    procps \
    nano \
    git \
    unzip \
    curl \
    libicu-dev \
    zlib1g-dev \
    libxml2 \
    libxml2-dev \
    libreadline-dev \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    supervisor \
    cron \
    sudo \
    libzip-dev \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure intl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    sockets \
    intl \
    gd \
    opcache \
    zip \
    && rm -rf /tmp/* \
    && rm -rf /var/list/apt/* \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get clean

# Install node
ENV NVM_VERSION v0.39.3
ENV NODE_VERSION v16.13.0
ENV NVM_DIR /usr/local/nvm
RUN mkdir $NVM_DIR
RUN curl -o- "https://raw.githubusercontent.com/creationix/nvm/${NVM_VERSION}/install.sh" | bash

ENV NODE_PATH $NVM_DIR/$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh && \
    nvm install $NODE_VERSION && \
    nvm alias default $NODE_VERSION && \
    nvm use default" | bash

# create document root, fix permissions for www-data user and change owner to www-data
RUN mkdir -p $APP_HOME/public && \
    mkdir -p /home/$USERNAME && chown $USERNAME:$USERNAME /home/$USERNAME \
    && usermod -o -u $HOST_UID $USERNAME -d /home/$USERNAME \
    && groupmod -o -g $HOST_GID $USERNAME \
    && chown -R ${USERNAME}:${USERNAME} $APP_HOME

# put php config for Laravel
COPY .docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY .docker/php/php.ini /usr/local/etc/php/php.ini

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN chmod +x /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1


# set working directory
WORKDIR $APP_HOME

USER ${USERNAME}

# copy source files and config file
COPY --chown=${USERNAME}:${USERNAME} . $APP_HOME/
COPY --chown=${USERNAME}:${USERNAME} .env $APP_HOME/.env

USER root

RUN composer install --no-interaction
RUN npm i
