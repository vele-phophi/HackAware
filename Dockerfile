# Use official PHP image with Apache
FROM php:8.2-apache

# Enable Apache rewrite module (optional but useful)
RUN a2enmod rewrite

# Install PostgreSQL support
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql

# Copy project files into Apache's web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port 80 for web traffic
EXPOSE 80
