FROM php:7.4-apache

WORKDIR /var/www/html

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#install PHPunit
RUN curl -O https://phar.phpunit.de/phpunit-6.5.0.phar

RUN chmod +x phpunit-6.5.0.phar && mv phpunit-6.5.0.phar /usr/local/bin/phpunit

# Expose the port Apache listens on
EXPOSE 80

ENV MYSQL_HOST=localhost
ENV MYSQL_USER=root
ENV MYSQL_PASSWORD=root

# Start Apache when the container runs
CMD ["apache2-foreground"]
