# Use a slim PHP image with Apache
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install additional PHP extensions (if needed)
RUN docker-php-ext-install mysqli pdo_mysql

# Expose the default Apache port
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2", "-D", "FOREGROUND"]