FROM php:7.4-apache

# Копирование файлов приложения в контейнер
COPY . /var/www/html/

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html/

# Экспонирование порта 80
EXPOSE 80
