FROM cusspvz/node:latest

# 国内加速
RUN npm config set registry "https://registry.npm.taobao.org"

# isntall pm2
RUN npm isntall pm2 -g

EXPOSE 8360

ADD init.sh /init.sh
RUN chmod +x /init.sh

CMD ["/init.sh"]