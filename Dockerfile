# Use official PHP image with Apache
FROM php:8.2-apache

# Enable mysqli and pdo_mysql extensions for MySQL support
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files into Apache's web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port 80 for web traffic
EXPOSE 80
