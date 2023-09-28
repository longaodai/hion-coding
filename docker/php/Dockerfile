FROM centos:centos7.5.1804

MAINTAINER OHION

COPY . /var/www/app

RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
 && rpm -Uvh https://rpms.remirepo.net/enterprise/remi-release-7.rpm

RUN yum -y update

RUN yum -y install php80 php80-php php80-php-opcache php80-php-bcmath php80-php-cli php80-php-common php80-php-gd php80-php-intl php80-php-json php80-php-mbstring php80-php-pdo php80-php-pdo-dblib php80-php-pear php80-php-pecl-mcrypt php80-php-xmlrpc php80-php-xml php80-php-mysql php80-php-soap php80-php-pecl-zip php80-php-pecl-mongodb php80-php-pecl-xdebug php80-php-pecl-yaml


# install apache 2.4.6 and config
RUN yum -y install httpd

# tools
RUN yum -y install epel-release iproute at curl crontabs git

RUN yum clean all \
 && php80 -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php80 composer-setup.php --install-dir=bin --filename=composer \
 && php80 -r "unlink('composer-setup.php');" \
 && rm -rf /etc/localtime \
 && ln -s /usr/share/zoneinfo/Europe/Berlin /etc/localtime \
 && ln -s /bin/php80 /bin/php

EXPOSE 80

WORKDIR /var/www/app

# config port 80
ADD docker/httpd/vhost.conf /etc/httpd/conf.d/welcome.conf

CMD ["/usr/sbin/httpd","-D","FOREGROUND"]

RUN systemctl enable httpd \
 && systemctl enable crond

#CMD ["/sbin/init"]
