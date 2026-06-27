# Usamos PHP 8.4 con Apache como servidor web
FROM php:8.4-apache

# Instalamos dependencias, incluyendo Node.js para el CSS
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Habilitamos las URLs amigables de Apache
RUN a2enmod rewrite

# Traemos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Indicamos nuestra carpeta de trabajo
WORKDIR /var/www/html

# Copiamos el código
COPY . /var/www/html

# Instalamos dependencias de PHP
RUN composer install --optimize-autoloader --no-dev

# Instalamos dependencias de Node y compilamos el CSS/JS
RUN npm install
RUN npm run build

# Damos permisos a las carpetas
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configuramos Apache para que lea la carpeta "public"
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 80