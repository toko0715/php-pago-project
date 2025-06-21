from php:8.2-cli
RUN curl -sS https://getcomposer.org/installer | php  -- --install-dir=/usr/local/bin/--filename=composer
COPY . /app
WORKDIR /app
RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]