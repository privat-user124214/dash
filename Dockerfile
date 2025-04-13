# Aktiviert mod_rewrite (optional, für saubere URLs)
RUN a2enmod rewrite

# Arbeitsverzeichnis im Container
WORKDIR /var/www/html

# Alles ins Web-Verzeichnis kopieren
COPY . /var/www/html/

# Konfiguration für Apache (optional, aber hilfreich)
COPY .htaccess /var/www/html/

# Port freigeben (Render nutzt automatisch Port 80)
EXPOSE 80
