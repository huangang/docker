FROM daocloud.io/centos:6.7
MAINTAINER "huangang" <huangangzhang@gmail.com>
RUN yum update -y
# add rpm
ADD epel-release-latest-6.noarch.rpm /epel-release-latest-6.noarch.rpm
ADD ius-release-1.0-14.ius.centos6.noarch.rpm /ius-release.rpm
RUN rpm -ivh /epel-release-latest-6.noarch.rpm
RUN rpm -ivh /ius-release.rpm
#install java
RUN yum -y install java-1.7.0-openjdk*
#install tomcat
RUN yum -y install tomcat tomcat-webapps tomcat-admin-webapps
RUN tomcat start-security
# install supervisor
RUN yum install -y supervisor && yum clean all #last clean
ADD supervisord.conf /etc/supervisord.conf

EXPOSE 8080

VOLUME /usr/share/tomcat/webapps/ROOT
CMD ["/usr/bin/supervisord"]
