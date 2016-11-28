FROM php:5.6-apache

RUN apt-get update
RUN apt-get install -y zlib1g-dev libjpeg-dev libpng-dev libfreetype6-dev libapache2-mod-fcgid php5-fpm php5-mysql libcurl4-gnutls-dev
RUN yes | pecl install xdebug

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install curl
RUN docker-php-ext-install gd
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable xdebug

RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.remote_enable=1" >> /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.default_enable=1" >> /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.remote_host=192.168.1.190" >> /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.remote_port=9000" >> /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.remote_autostart=true" >> /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.remote_mode=req" >> /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.remote_handler=dbgp" >> /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.remote_connect_back=1" >> /etc/php5/fpm/conf.d/xdebug.ini
RUN echo "xdebug.remote_host=127.0.0.1" >> /etc/php5/fpm/conf.d/xdebug.ini

RUN a2enmod headers proxy proxy_http proxy_fcgi rewrite ssl fcgid

RUN mkdir /srv/logs
RUN chown www-data:www-data /srv -R

CMD service php5-fpm start && apachectl -DFOREGROUND
