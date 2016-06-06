# Mongo no sql 数据库
## docker pull 下载所需要的镜像
``` bash
docker pull mongo:latest
```
## 或者用国内加速[dao](https://www.daocloud.io/)命令下载
``` bash
dao pull mongo:latest
```
## 创建带有用户密码的mongo
```
docker run --name some-mongo -p 27017:27017 -d mongo --auth 
docker exec -it some-mongo mongo admin
db.createUser({ user: 'jsmith', pwd: '123456', roles: [ { role: "userAdminAnyDatabase", db: "admin" } ] }); ## 到这里的时候就成功了
docker run -it --rm --link some-mongo:mongo mongo mongo -u jsmith -p 123456 --authenticationDatabase admin some-mongo/some-db ## 这个是用docker命令进入mongo容器里
```