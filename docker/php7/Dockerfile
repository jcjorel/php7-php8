FROM php:7.4-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Update and install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip

# Configure PHP
RUN echo "display_errors=1" >> /usr/local/etc/php/php.ini \
    && echo "error_reporting=E_ALL" >> /usr/local/etc/php/php.ini

# Copy application files
COPY ./app/ /var/www/html/

# Expose port
EXPOSE 80

# Set permissions
RUN chown -R www-data:www-data /var/www/html
