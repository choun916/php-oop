FROM php:7.4-apache

RUN apt-get update
RUN apt-get -y dist-upgrade
RUN apt-get -y install vim curl
RUN apt-get -y install default-mysql-client
#RUN apt-get -y install default-mysql-client-core
RUN a2enmod rewrite
#RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 100M/' /usr/local/etc/php/php.ini
RUN sed -i 's/post_max_size = 8M/post_max_size = 100M/' /usr/local/etc/php/php.ini
#RUN sed -i 's/;extension=mysqli/extension=mysqli/' /usr/local/etc/php/php.ini
#RUN sed -i 's/;extension=php_mbstring/extension=php_mbstring/' /usr/local/etc/php/php.ini
#RUN sed -i 's/;extension=pdo_mysql/extension=pdo_mysql/' /usr/local/etc/php/php.ini
RUN sed -i 's/DocumentRoot \/var\/www\/html/DocumentRoot \/var\/www\/html\n<Directory "\/var\/www\/html">\nAllowOverride All\nRequire all granted\n<\/Directory>/' /etc/apache2/sites-enabled/000-default.conf

# Install composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV TZ=Asia/Seoul
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone