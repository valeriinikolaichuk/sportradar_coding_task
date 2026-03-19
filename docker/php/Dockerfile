FROM php:8.2-fpm

# Пакети для Symfony
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libzip-dev zlib1g-dev \
    && docker-php-ext-install intl pdo_mysql zip opcache

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Копіюємо реальний проект
COPY backend/ .

# Встановлюємо залежності
RUN composer install --no-interaction --optimize-autoloader

EXPOSE 9000
CMD ["php-fpm"]