FROM php:8.2-fpm-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

COPY ./docker/php/entrypoint.sh /

RUN chmod +x /entrypoint.sh

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions @composer pdo_mysql

RUN apk update --no-cache && apk add git

ENTRYPOINT ["/entrypoint.sh"]