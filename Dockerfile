FROM php:8.3-fpm

# تثبيت المتطلبات
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# إعداد مجلد العمل
WORKDIR /var/www

# نسخ كل الملفات
COPY . .

# تثبيت الـ dependencies
RUN composer install --no-dev --optimize-autoloader

# إعداد التصاريح
RUN chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# فتح السيرفر
CMD php artisan serve --host=0.0.0.0 --port=8080
