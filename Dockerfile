FROM php:8.2-apache

# Apache Rewrite aktivieren
RUN a2enmod rewrite

# Konfiguration für .htaccess erlauben
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Dateien in Webverzeichnis kopieren
COPY . /var/www/html/

# Eigentümer setzen
RUN chown -R www-data:www-data /var/www/html
