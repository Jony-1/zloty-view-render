# Usar una imagen base de PHP
FROM php:7.4-apache

# Copiar los archivos de la aplicación al contenedor
COPY . /var/www/html/

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80
