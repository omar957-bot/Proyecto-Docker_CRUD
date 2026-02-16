FROM php:8.2-fpm

# instalar dependencias del sistema y extensiones PHP necesarias
RUN apt-get update \
    && apt-get install -y git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath zip \
    && rm -rf /var/lib/apt/lists/*

# traer composer del contenedor oficial de composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar sólo composer.json (no depende del vendor del host). Composer generará vendor dentro de la imagen.
COPY rappi/composer.json ./

# Instalar dependencias PHP dentro de la imagen
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction --no-scripts || true

# Copiar el resto de la aplicación
COPY rappi/ ./

# Permisos mínimos para storage y cache
RUN chown -R www-data:www-data storage bootstrap/cache || true

EXPOSE 9000

CMD ["php-fpm"]
