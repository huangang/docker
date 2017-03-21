## Sinopia (Docker 镜像)

Sinopia 是一个 npm 私服

### 下载镜像

`docker pull keyvanfatehi/sinopia:latest`

### 创建容器

`docker run --name sinopia -d -p 4873:4873 keyvanfatehi/sinopia:latest`

### 设置 Registry

`npm set registry http://<docker_host>:4873/`

### 确定用户名和密码

`docker logs sinopia`

### 修改配置

这里有2种方式来修改配置.

认识和理解它们的不同, 查看讨论 https://github.com/keyvanfatehi/docker-sinopia/pull/10

### 原始方法

```
docker stop sinopia
docker run --volumes-from sinopia -it --rm ubuntu vi /opt/sinopia/config.yaml
docker start sinopia
```

### 替代方法

```
# 保存配置文件
curl -L https://raw.githubusercontent.com/rlidwka/sinopia/master/conf/default.yaml -o /path/to/config.yaml
# 将配置文件挂载到暴露的数据卷
docker run -v /path/to/config.yaml:/opt/sinopia/config.yaml --name sinopia -d -p 4873:4873 keyvanfatehi/sinopia:latest
```

重新启动容器，随时更改配置。

### 备份

`docker run --volumes-from sinopia -v $(pwd):/backup ubuntu tar cvf /backup/backup.tar /opt/sinopia`

另外, 主机路径`/opt/sinopia` 可以通过运行确定:

`docker inspect sinopia`

### 恢复

```
docker stop sinopia
docker rm sinopia
docker run --name sinopia -d -p 4873:4873 keyvanfatehi/sinopia:latest
docker stop sinopia
docker run --volumes-from sinopia -v $(pwd):/backup ubuntu tar xvf /backup/backup.tar
docker start sinopia
```

## 链接

* [Sinopia on Github](https://github.com/rlidwka/sinopia)