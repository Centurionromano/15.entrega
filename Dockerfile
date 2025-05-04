# Imagen base con PHP y Apache
FROM php:8.2-apache

# Habilitar extensiones necesarias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar todo el contenido del proyecto al contenedor
COPY . /var/www/html/

# Dar permisos al contenido
RUN chown -R www-data:www-data /var/www/html

# Habilitar el módulo de reescritura de Apache (útil para CodeIgniter)
RUN a2enmod rewrite

# Configuración personalizada del virtual host
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
