# Usa la imagen oficial de PHP 8.1 con Apache
FROM php:8.1-apache

# Instala la extensión mysqli para MySQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia todo el proyecto al directorio público de Apache
COPY . /var/www/html/

# Ajusta permisos (opcional pero recomendable)
RUN chown -R www-data:www-data /var/www/html/

# Expone el puerto 80 (Railway lo mapeará automáticamente)
EXPOSE 80

# Comando por defecto (ya gestionado por la imagen base):
#   Apache arranca automáticamente.