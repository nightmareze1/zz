FROM wordpress

# Copy directorys a Imagen Docker
COPY html /var/www/html
COPY apache2/apache2.conf /etc/apache2/apache2.conf
COPY apache2/mods-available/status.conf /etc/apache2/mods-available/status.conf

RUN apt-get update && apt-get install -y libz-dev libmemcached-dev

RUN curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
    && mkdir -p /usr/src/php/ext/memcached \
    && tar -C /usr/src/php/ext/memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
    && docker-php-ext-configure memcached \
    && docker-php-ext-install memcached \
    && rm /tmp/memcached.tar.gz

COPY apache2/sites-enabled/ /etc/apache2/sites-enabled/

EXPOSE 80 443
