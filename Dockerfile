# Используем базовый образ с Apache и PHP
FROM php:7.4-apache

# Устанавливаем необходимые пакеты и зависимости
RUN apt-get update \
    && apt-get install -y \
       libapache2-mod-security2 \
       nano \
    && a2enmod security2

# Устанавливаем модули PHP, если это необходимо
RUN docker-php-ext-install mysqli

# Копируем конфигурационные файлы ModSecurity
COPY modsecurity.conf /etc/modsecurity/modsecurity.conf
COPY security2.conf /etc/apache2/mods-available/security2.conf

# Перезапускаем Apache, чтобы применить изменения
RUN service apache2 restart

# Копируем файлы вашего приложения в образ
COPY . /var/www/html/

# Определяем порт, который будет открыт в контейнере
EXPOSE 80







