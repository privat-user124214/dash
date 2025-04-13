FROM php:8.2-apache

# Aktiviert Apache Rewrite-Modul
RUN a2enmod rewrite

# Kopiert alle Dateien ins Webverzeichnis
COPY . /var/www/html/

# Setzt Rechte (optional)
RUN chown -R www-data:www-data /var/www/html
