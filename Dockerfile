# Use official PHP image with Apache
FROM php:8.2-apache

# Install required system packages for PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pgsql

# Copy your project files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port 10000 for Render
EXPOSE 10000

# Update Apache to listen on port 10000
RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf && \
    sed -i 's/:80/:10000/' /etc/apache2/sites-enabled/000-default.conf

# Start Apache in foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]
