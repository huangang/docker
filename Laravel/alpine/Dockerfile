FROM webdevops/php-nginx:alpine-3-php7

ENV TIMEZONE=Asia/Shanghai

RUN apk update && apk --no-cache add tzdata

# Setting the timezone
RUN cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" >  /etc/timezone
ADD crontab /var/spool/cron/crontabs/root

ADD init.sh /init.sh
RUN chmod 777 /init.sh

ADD vhost.conf /opt/docker/etc/nginx/vhost.conf
ADD cron.conf /opt/docker/etc/supervisor.d/cron.conf

WORKDIR app