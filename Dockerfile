# Usamos PHP 8.4 con Apache como servidor web
FROM php:8.4-apache

# Instalamos dependencias esenciales del sistema para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Habilitamos las URLs amigables de Apache
RUN a2enmod rewrite

# Traemos Composer para manejar los paquetes
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Indicamos nuestra carpeta de trabajo
WORKDIR /var/www/html

# Copiamos todo el código de tu proyecto al servidor
COPY . /var/www/html

# Instalamos las librerías de Laravel
RUN composer install --optimize-autoloader --no-dev

# Damos permisos a las carpetas que el sistema necesita modificar (logs, caché)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configuramos Apache para que lea directamente la carpeta "public"
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Exponemos el puerto web
EXPOSE 80