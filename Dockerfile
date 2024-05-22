FROM php:8.2-fpm

RUN apt update && apt install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev
RUN apt clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get update && apt-get install -y --no-install-recommends nodejs npm

WORKDIR /usr/src/app
COPY package.json package-lock.json ./

RUN npm install
COPY . ./
RUN npm run build

ENV MYSQL_ENCODING UTF-8
ENV MYSQL_CHARACTER_SET UTF8

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
