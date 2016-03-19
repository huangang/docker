FROM daocloud.io/centos:6.7
MAINTAINER "huangang" <huangang@bombvote.com>
RUN yum update -y
RUN rpm -ivh https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm
RUN rpm -ivh https://centos6.iuscommunity.org/ius-release.rpm

#install crontab
RUN  yum install vixie-cron crontabs -y

# install supervisor
RUN yum install -y supervisor
ADD supervisord.conf /etc/supervisord.conf

#install php
RUN yum install -y \
php55u \
php55u-fpm \
php55u-mysql \
php55u-redis \
php55u-mbstring \
php55u-mcrypt \
php55u-openssl \
php55u-tokenizer && yum clean all

RUN rm -rf /etc/localtime && cp -f /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

CMD ["/usr/bin/supervisord"]