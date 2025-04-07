# Usar una imagen oficial de PHP como base
FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instalar Composer (gestor de dependencias PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar npm (gestor de dependencias de JavaScript)
RUN apt-get install -y nodejs

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar el código del proyecto al contenedor
COPY . .

# Instalar las dependencias de Laravel con Composer
RUN composer install

# Instalar dependencias de JavaScript con npm
RUN npm install

# Establecer permisos para el almacenamiento de Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponer el puerto 9000
EXPOSE 9000

CMD ["php-fpm"]
