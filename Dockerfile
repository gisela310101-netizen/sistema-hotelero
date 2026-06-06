FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    curl zip unzip git \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /app
COPY . .

RUN cp .env.example .env
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate

RUN touch /app/database/database.sqlite
RUN php artisan migrate --force

RUN php artisan config:cache

EXPOSE 10000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]