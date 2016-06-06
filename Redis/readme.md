# redis 
## docker pull 下载所需要的镜像
``` bash
docker pull tutum/redis:latest
```
## 或者用国内加速[dao](https://www.daocloud.io/)命令下载
``` bash
dao pull tutum/redis:latest
```
## run
```
docker run -d -p 6379:6379 tutum/redis
```
`docker logs <CONTAINER_ID>`查看容易日志     
你将会看到     
```
========================================================================
You can now connect to this Redis server using:

    redis-cli -a gniDpzJ43FbAeggtFwIQrPHGeF1RDZ3z -h <host> -p <port>

Please remember to change the above password as soon as possible!
========================================================================
```

`gniDpzJ43FbAeggtFwIQrPHGeF1RDZ3z`就是redis的密码      

如果你想自己设置密码执行`docker run -d -p 6379:6379 -e REDIS_PASS="mypass" tutum/redis`

### [参考](https://hub.docker.com/r/tutum/redis/)