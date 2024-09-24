# Use the official PHP image as the base image
FROM php:8.1-apache

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the application code into the container
COPY ./platform /var/www/html

# Set the working directory
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    nodejs \
    zip \
    unzip \
    npm \
    nano


COPY docker-files/apache.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R 1000:1000 storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R 1000:1000 /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage
# Enable Apache rewrite module
RUN a2enmod rewrite

EXPOSE 80 5173
