FROM daocloud.io/centos:6.7
MAINTAINER "huangang" <huangangzhang@gmail.com>
RUN yum update -y
ADD epel-release-latest-6.noarch.rpm /epel-release-latest-6.noarch.rpm
RUN rpm -ivh /epel-release-latest-6.noarch.rpm
ADD ius-release-1.0-14.ius.centos6.noarch.rpm /ius-release.rpm
RUN rpm -ivh ius-release.rpm
#install php
RUN yum install -y \
php56u \
php56u-fpm \
php56u-mysql \
php56u-mbstring \
php56u-mcrypt \
php56u-openssl \
php56u-mongo \
php56u-redis \
php56u-tokenizer
# install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN chmod a+x composer.phar
RUN mv composer.phar /usr/bin/composer
## composer国内加速
RUN composer config -g repo.packagist composer https://packagist.phpcomposer.com
# install supervisor
RUN yum install -y supervisor
ADD supervisord.conf /etc/supervisord.conf
#install nginx
ADD nginx.repo /etc/yum.repos.d/
RUN yum install -y nginx && yum clean all #last clean
ADD default.conf /etc/nginx/conf.d/
# start 80
EXPOSE 80

ADD init.sh /init.sh
RUN chmod 777 /init.sh
VOLUME /var/www/app

CMD ["/usr/bin/supervisord"]

