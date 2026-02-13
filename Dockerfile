# syntax=docker/dockerfile:1
# Multi-stage build: frontend assets then PHP + nginx runtime

# -----------------------------------------------------------------------------
# Stage 1: Build Vite/Node assets
# -----------------------------------------------------------------------------
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json* ./
RUN npm ci

COPY vite.config.js ./
COPY resources ./resources
COPY public ./public

ENV NODE_ENV=production
RUN npm run build

# -----------------------------------------------------------------------------
# Stage 2: PHP + nginx application
# -----------------------------------------------------------------------------
FROM php:8.2-fpm-alpine AS app

RUN apk add --no-cache \
    nginx \
    supervisor \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    sqlite-dev \
    oniguruma-dev \
    icu-dev \
    linux-headers \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        ctype \
        dom \
        fileinfo \
        intl \
        mbstring \
        opcache \
        pdo \
        pdo_sqlite \
        pdo_mysql \
        xml \
        zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .
COPY --from=frontend /app/public/build ./public/build

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-dev --no-interaction --optimize-autoloader --prefer-dist

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

ENV APP_ENV=production
ENV APP_DEBUG=false
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

COPY docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/zz-app.conf
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN mkdir -p /run/nginx /var/log/nginx
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
