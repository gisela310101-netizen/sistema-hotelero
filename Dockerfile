FROM php:8.2-cli

# Forzar rebuild - v2
RUN apt-get update && apt-get install -y \
    curl zip unzip git \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /app
COPY . .

RUN cp .env.example .env
RUN cat .env | grep DB_CONNECTION
RUN cat .env | grep SESSION_DRIVER
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan config:cache
RUN php artisan route:cache

EXPOSE 10000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]