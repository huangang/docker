
## 运行
docker build -t workerman:1.0.0 .
docker run -v /var/apps/your-project:/var/www/app-service -e ENV=env \
-i -t -d -p HostPort:ContainerPort -e INIT=bin/setup workerman:1.0.0

