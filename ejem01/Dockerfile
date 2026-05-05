# Cambiamos a una versión actual (PHP 8.2 basada en Debian Bookworm)
FROM php:8.2-apache

# Copiamos los ficheros
COPY src/ /var/www/html

# Exponemos el puerto
EXPOSE 80

# Etiqueta de mantenimiento (MAINTAINER está en desuso, se prefiere LABEL)
LABEL maintainer="JL Gonzalez <jlgs@cifpvirgendegracia.com>"

# Ahora el update funcionará correctamente sin errores 404
RUN apt-get update && apt-get install -y vim