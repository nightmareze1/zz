FROM wordpress

# Copy directorys a Imagen Docker
COPY html /var/www/html
COPY apache2/apache2.conf /etc/apache2/apache2.conf
COPY apache2/mods-available/status.conf /etc/apache2/mods-available/status.conf
COPY apache2/sites-enabled/ /etc/apache2/sites-enabled/

EXPOSE 80 443
