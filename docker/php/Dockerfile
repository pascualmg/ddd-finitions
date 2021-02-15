FROM php:fpm
RUN apt-get update && \
    apt-get install -y \
        apt-utils \
        bash \
        zip && \
    mkdir /var/app

ENV PATH /var/app/bin:/var/app/vendor/bin:$PATH
WORKDIR /var/app

RUN apt-get install -y git

RUN pecl install xdebug &&\
 docker-php-ext-enable xdebug

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
php composer-setup.php && \
php -r "unlink('composer-setup.php');" && \
mv -v /var/app/composer.phar /usr/bin/composer && \
chmod 755 /usr/bin/composer

