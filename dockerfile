FROM php:8.1.10-fpm-alpine3.15

COPY ./src /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN apk add libzip-dev

RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENTRYPOINT [ "/bin/sh","-c","composer install --ignore-platform-reqs && php artisan key:generate && php artisan migrate:refresh  && php artisan passport:client --password && php artisan passport:install && php artisan db:seed && php artisan serve --host 0.0.0.0 --port=9000" ]

