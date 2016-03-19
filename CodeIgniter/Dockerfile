FROM daocloud.io/centos:6.7
MAINTAINER "huangang" <huangangzhang@gmail.com>
RUN yum update -y
RUN rpm -ivh https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm
RUN rpm -ivh https://centos6.iuscommunity.org/ius-release.rpm

#install php
RUN yum install -y \
php55u \
php55u-fpm \
php55u-mysql \
php55u-redis \
php55u-mbstring
# install supervisor
RUN yum install -y supervisor
ADD supervisord.conf /etc/supervisord.conf
#install nginx
ADD nginx.repo /etc/yum.repos.d/
RUN yum install -y nginx  && yum clean all
ADD default.conf /etc/nginx/conf.d/
# start 80
EXPOSE 80

VOLUME /var/www/app

CMD ["/usr/bin/supervisord"]
