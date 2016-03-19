
## 运行
docker build -t crontab:1.0.0 .

docker run -v /var/apps/cron:/var/spool/cron -v /var/apps:/var/www/apps -i -t -d -e INIT=bin/setup crontab:1.0.0

## cron file demo
``` cron
26 1 * * * /usr/bin/php /var/www/apps/test.php
```