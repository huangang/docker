# Dockerfile配置

## 说明
因为国内从docker.io下载太慢,所以原始镜像大部分来自[DaoCloud](https://www.daocloud.io/)


### 查看docker容器IP
```
docker inspect --format='{{.NetworkSettings.IPAddress}}' $CONTAINER_ID 
```

### nginx反向代理配置例子
```
upstream test.com {    
    server 192.168.48.0:80;    
}    
server {     
    #ssl_certificate /etc/nginx/certs/demo.pem;     
    #ssl_certificate_key /etc/nginx/certs/demo.key;     
    gzip_types text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript;    
    server_name test.com;    
    location / {     
        proxy_pass http://test.com;     
        include /etc/nginx/proxy_params;      
    }   
}   
## ln -sfv /etc/nginx/sites-available/test.com /etc/nginx/sites-enabled/test.com
```