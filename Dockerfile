FROM php:8.2-cli

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip \
    curl \
    libzip-dev \
    && docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Copy Symfony project
WORKDIR /app
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
