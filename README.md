# Dockerfile配置

## 说明
因为国内从docker.io下载太慢,所以原始镜像大部分来自[DaoCloud](https://www.daocloud.io/)

## nginx反向代码模版
```
upstream api.huangang.com {    
    server 192.168.42.25:80;    
}     
server {     
    #ssl_certificate /etc/nginx/certs/demo.pem;      
    #ssl_certificate_key /etc/nginx/certs/demo.key;      
    gzip_types text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript;     
    server_name api.huangang.com;     
    location / {
        proxy_pass                         http://api.huangang.com;    
        proxy_set_header Host              $host;    
        proxy_set_header X-Real-IP         $remote_addr;     
        proxy_set_header X-Forwarded-For   $proxy_add_x_forwarded_for;    
        proxy_set_header X-Forwarded-Proto $scheme;      
    }    
}   
```
## 备注
查看docker容器IP `docker inspect --format='{{.NetworkSettings.IPAddress}}' $CONTAINER_ID`

