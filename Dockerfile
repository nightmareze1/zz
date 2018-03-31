FROM wordpress

# Copy directorys a Imagen Docker
COPY html /var/www/html
COPY apache2/apache2.conf /etc/apache2/apache2.conf
COPY apache2/mods-available/status.conf /etc/apache2/mods-available/status.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
   && sed -i -e '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
   && sed -i -e "s#DocumentRoot.*#DocumentRoot /var/www/html#" /etc/apache2/sites-available/000-default.conf 

EXPOSE 80 443
