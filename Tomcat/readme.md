## 运行
`docker build -t tomcat:1.0.0 . `
`docker run -i -t -d  -p 8080:8080 -e INIT=bin/setup -e VIRTUAL_HOST=your.domain --name your.domain tomcat:1.0.0`
用户名:admin, TOMCAT_PASS 为您需要的密码
## nginx 反向代理
```
upstream tomcat.pupued.com {    
    server 192.168.42.44:8080;    
}     
server {     
    #ssl_certificate /etc/nginx/certs/demo.pem;      
    #ssl_certificate_key /etc/nginx/certs/demo.key;      
    gzip_types text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript;     
    server_name tomcat.pupued.com;     
    location / {
        proxy_pass                         http://tomcat.pupued.com;    
        proxy_set_header Host              $host;    
        proxy_set_header X-Real-IP         $remote_addr;     
        proxy_set_header X-Forwarded-For   $proxy_add_x_forwarded_for;    
        proxy_set_header X-Forwarded-Proto $scheme;      
    }    
}  
```

## 其他镜象
```
docker pull daocloud.io/daocloud/dao-tomcat:v7.0.55
docker run -d -p 8080:8080 -e TOMCAT_PASS="mypass" daocloud.io/daocloud/dao-tomcat:v7.0.55 # 用户名:admin, TOMCAT_PASS 为您需要的密码
```