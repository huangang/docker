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
php56u-mysql \
php56u-redis \
php56u-mongo \
php56u-mbstring \
php56u-pcntl \
php56u-posix \
php56u-libevent


RUN yum install -y supervisor && yum clean all #last clean
ADD supervisord.conf /etc/supervisord.conf


ADD init.sh /init.sh
RUN chmod 777 /init.sh
VOLUME /var/www/service
ADD jsonrpc.sh /var/www/jsonrpc.sh

CMD ["/usr/bin/supervisord"]
