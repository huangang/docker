FROM daocloud.io/centos:6.7
MAINTAINER "huangang" <huangang@bombvote.com>
RUN yum update -y
RUN rpm -ivh https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm
RUN rpm -ivh https://centos6.iuscommunity.org/ius-release.rpm

#install php
RUN yum install -y \
php55u \
php55u-fpm \
php55u-mysql \
php55u-redis \
php55u-mbstring \
php55u-pcntl \
php55u-posix \
php55u-libevent

RUN yum install -y supervisor && yum clean all #last clean
ADD supervisord.conf /etc/supervisord.conf


ADD init.sh /init.sh
RUN chmod 777 /init.sh
VOLUME /var/www/app-service

CMD ["/usr/bin/supervisord"]
