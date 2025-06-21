from php:8.2-cli
RUN mkdir -p /usr/local/bin
RUN curl -sS https://getcomposer.org/installer | php && \ mv composer.phar /usr/local/bin/composer
COPY . /app
WORKDIR /app
RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]