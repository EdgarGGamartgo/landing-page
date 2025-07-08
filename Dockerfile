# Use official PHP image with required extensions
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
  libpq-dev \
  libzip-dev \
  zip \
  unzip \
  git \
  curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate app key
RUN php artisan key:generate

# Set permissions
RUN chmod -R 755 storage
RUN chmod -R 755 bootstrap/cache

# Copy entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

# Make it executable
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose port for Laravel dev server
EXPOSE 8000

# Run the entrypoint script on container start
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
