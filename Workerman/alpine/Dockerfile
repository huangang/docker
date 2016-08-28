FROM webdevops/php:alpine-3-php7

ENV TIMEZONE=Asia/Shanghai

RUN apk update && apk --no-cache add tzdata

# Setting the timezone
RUN cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" >  /etc/timezone

#init
ADD init.sh init.sh
RUN chmod 777 init.sh
ADD init.conf /opt/docker/etc/supervisor.d/init.conf

# jsonrpc
ADD jsonrpc.sh jsonrpc.sh
RUN chmod 777 jsonrpc.sh

WORKDIR app

# 暴露20160端口
EXPOSE 20160
