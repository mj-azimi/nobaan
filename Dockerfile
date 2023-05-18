# استفاده از تصویر رسمی PHP 8.1 با آپاچی به عنوان پایه
FROM php:8.1-apache

# نصب پکیج‌های مورد نیاز
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip \
    && a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# کپی فایل‌های پروژه به داخل کانتینر
COPY . /var/www/html/

# تنظیمات Apache
RUN chown -R www-data:www-data /var/www/html/
RUN a2enmod rewrite

# پورت استاندارد آپاچی را بروی 80 تنظیم می‌کنیم
EXPOSE 80

# دستورات اجرا شده در هنگام ساخت کانتینر
CMD ["apache2-foreground"]
