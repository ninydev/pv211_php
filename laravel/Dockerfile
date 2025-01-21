# Используем официальный PHP образ
FROM php:8.4-cli

# Устанавливаем необходимые пакеты
RUN apt-get update && apt-get install -y zip unzip mc git curl

RUN apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
# RUN apt-get install -y  php8.4-gd
RUN docker-php-ext-install gd

# Устанавливаем расширения PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем Xdebug (если нужен)
# RUN pecl install xdebug && docker-php-ext-enable xdebug

# Устанавливаем рабочую директорию в контейнере
WORKDIR /var/www

# Указываем команду по умолчанию для запуска PHP Development Server
# CMD ["php", "./artisan", "serve"]
