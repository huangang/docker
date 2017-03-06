# docker for eggjs
## build
`docker build -t eggjs:1.0.0 .`
## run    
``` bash
docker run -p 7001:7001 -itd -v $(pwd):/app eggjs:1.0.0`
## 进入到容器
docker exec -it CONTAINER_ID /bin/sh
pm2 stop app
EGG_SERVER_ENV=prod nohup node dispatch.js > stdout.log 2> stderr.log & # 后台启动
```



