FROM php:7.4-fpm-alpine

# Install common packages
RUN set -xe \
    && apk add --no-cache bash \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS

RUN set -xe \
    && apk add --no-cache nginx \
    && apk add --no-cache shadow \
    && apk add --no-cache supervisor \
    # Workaround for existing files permissions
     && usermod -u 101 nginx \
    && groupmod -g 102 nginx \
    # The dir is coming with this dir, but ownership is set to package user with UID 100
    && mkdir -p /var/tmp/nginx \
    && chown nginx:nginx /var/tmp/nginx

COPY ./etc/supervisord.conf /etc/supervisord.conf
COPY ./etc/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./etc/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf
COPY ./app /app

RUN mkdir /run/nginx

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
