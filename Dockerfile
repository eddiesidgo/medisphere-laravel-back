# Usa una imagen base de PHP con Composer instalado
FROM php:8.2-fpm

# Instala extensiones necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia los archivos del proyecto al contenedor
COPY . .

# Instala las dependencias de Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Da permisos al almacenamiento
RUN chown -R www-data:www-data /var/www/storage

# Expone el puerto 9000 para el servidor de PHP
EXPOSE 9000

CMD ["php-fpm"]
