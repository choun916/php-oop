FROM php:8.1-apache

RUN apt-get update
RUN apt-get -y dist-upgrade
RUN apt-get -y install vim

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 100M/' /usr/local/etc/php/php.ini
RUN sed -i 's/post_max_size = 8M/post_max_size = 100M/' /usr/local/etc/php/php.ini
RUN sed -i 's/DocumentRoot \/var\/www\/html/DocumentRoot \/var\/www\/html\/public/' /etc/apache2/sites-enabled/000-default.conf

ENV TZ=Asia/Seoul
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone