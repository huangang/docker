# sentry 日志监控系统搭建
## docker pull 下载所需要的镜像
``` bash
docker pull redis:latest
docker pull postgres:latest
docker pull sentry:latest
```
## 或者用国内加速[dao](https://www.daocloud.io/)命令下载
``` bash
dao pull redis:latest
dao pull postgres:latest
dao pull sentry:latest
```

## 启动 redis 和 postgres 服务
``` bash
docker run -d --name sentry-redis redis
docker run -d --name sentry-postgres -e POSTGRES_PASSWORD=secret -e POSTGRES_USER=sentry postgres
```
## 启动 sentry 服务
接下来先run sentry获取secret-key       
`docker run --rm sentry generate-secret-key`            
显示`dzb5vn_1a^g%4sfc8tqk(!38fs7wov*!)-a(s_tpspz8jevdze`即接下来<secret-key>              
接下来`docker run -it --rm -e              SENTRY_SECRET_KEY='<secret-key>' --link sentry-postgres:postgres --link sentry-redis:redis sentry upgrade`      
控制台会打印出`Would you like to create a user     account now? [Y/n]: `输入y     
`Email:`输入你的邮箱     
`Password: `输入密码      
`Repeat for confirmation: ` 再次输入密码       
`Should this user be a superuser? [y/N]:`输入y     
### run sentry
`docker run -d --name my-sentry -e SENTRY_SECRET_KEY='<secret-key>' --link sentry-redis:redis --link sentry-postgres:postgres sentry`
默认的配置需要一个celery beat和celery workers，开始尽可能多的容器你所需要的（每一个都有独特的名字）
```
docker run -d --name sentry-celery-beat -e SENTRY_SECRET_KEY='<secret-key>' --link sentry-postgres:postgres --link sentry-redis:redis sentry celery beat
docker run -d --name sentry-celery1 -e SENTRY_SECRET_KEY='<secret-key>' --link sentry-postgres:postgres --link sentry-redis:redis sentry celery worker
```

If you'd like to be able to access the instance from the host without the container's IP, standard port mappings can be used. Just add -p 8080:9000 to the docker run arguments and then access either http://localhost:8080 or http://host-ip:8080 in a browser.

## 备注
上面run的sentry邮件是发不出去的,进行如下配置
```
docker run -d --name my-sentry \
-e SENTRY_SERVER_EMAIL='your@email.com' \
-e SENTRY_EMAIL_HOST='youremail.host' \
-e SENTRY_EMAIL_PORT='emailport' \ #一般为25
-e SENTRY_EMAIL_USE_TLS='false' \
-e SENTRY_EMAIL_USER='username' \
-e SENTRY_EMAIL_PASSWORD='password' \
-e SENTRY_SECRET_KEY='<secret-key>' --link sentry-redis:redis --link sentry-postgres:postgres sentry
```

[laravel && lumen 配置 sentry](https://github.com/getsentry/raven-php)