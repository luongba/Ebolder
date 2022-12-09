FROM php:7.4.33-apache

RUN a2enmod speling

# install platform
RUN apt-get update -y
RUN apt-get install -y nodejs

# coping resources
COPY . /var/www/
COPY ./apache2.conf /etc/apache2/apache2.conf
WORKDIR /var/www/

RUN rm -rf /var/www/html
RUN ln -s /var/www/public /var/www/html

# fix bootstrap/cache missing
RUN mkdir /var/www/bootstrap/cache

# fix permissions
RUN chmod 7777 . -R

RUN npm i