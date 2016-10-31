FROM cusspvz/node:latest

# isntall npminstall
RUN npm install -g npminstall

# isntall pm2
RUN npminstall pm2 -g

EXPOSE 8360

ADD init.sh /init.sh
RUN chmod +x /init.sh

CMD ["/init.sh"]