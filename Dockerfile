# Gunakan image PHP yang sesuai
FROM php:8.0-fpm

# Install dependensi yang diperlukan
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git unzip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tentukan working directory
WORKDIR /var/www

# Salin file project ke dalam container
COPY . .

# Install Laravel dependencies
RUN composer install

# Menjalankan perintah untuk membuat cache Laravel
RUN php artisan config:cache

# Expose port yang digunakan
EXPOSE 9000

# Tentukan perintah untuk menjalankan aplikasi
CMD ["php-fpm"]
