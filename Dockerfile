FROM php:7.4-apache

WORKDIR /var/www/html

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

# Expose the port Apache listens on
EXPOSE 80

ENV MYSQL_HOST=localhost
ENV MYSQL_USER=root
ENV MYSQL_PASSWORD=root

# Start Apache when the container runs
CMD ["apache2-foreground"]
