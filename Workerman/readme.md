
## build
`docker build -t workerman:1.0.0 .`
## run
`docker run -v /var/apps/your-project:/var/www/app-service -e ENV=env \
-i -t -d -p HostPort:ContainerPort -e INIT=bin/setup workerman:1.0.0`

## 说明
项目启动默认要有个start.php,demo可以看[这个](https://github.com/zhanghuangang/docker/tree/master/Workerman/start.php)
[workerman](https://github.com/walkor/workerman/)