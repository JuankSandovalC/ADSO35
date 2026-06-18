FROM php:8.2-apache

# Instalar dependencias del sistema y extensiones de PHP para SQLite
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    unzip \
    zip \
    git \
    && docker-php-ext-install pdo pdo_sqlite

# Activar el mod_rewrite de Apache para las rutas de Laravel
RUN a2enmod rewrite

# Apuntar el servidor a la carpeta public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Copiar los archivos del proyecto al servidor
COPY . /var/www/html

# Instalar Composer y las dependencias de Laravel
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Crear la base de datos SQLite y dar permisos de escritura
RUN touch database/database.sqlite \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache database

# Ejecutar migraciones automáticas al encender y arrancar Apache
CMD php artisan migrate --force && apache2-foreground
