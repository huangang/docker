FROM cusspvz/node:latest

## install tzdata
ENV TIMEZONE=Asia/Shanghai
RUN apk update && apk add tzdata
# Setting the timezone
RUN cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" >  /etc/timezone
RUN apk del tzdata
# 国内加速
RUN npm config set registry "https://registry.npm.taobao.org"

# isntall pm2
RUN npm isntall pm2 -g

EXPOSE 7001

ADD init.sh /init.sh
RUN chmod +x /init.sh

CMD ["/init.sh"]