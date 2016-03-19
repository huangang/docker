
## 备注
要保证项目的入口index.php的权限为644
mac or windows 如果出现500无法显示,则执行下面
``` bash
chmod -R 777 storage
chmod -R 777 bootstrap/cache
```
本配置lumen和laravel均适用
## 运行
docker build -t laravel:1.0.2 .  
docker run -v /var/apps/your-project:/var/www/app -i -t -d -P -e INIT=bin/setup -e VIRTUAL_HOST=your.domain --name your.domain laravel:1.0.2

## nginx反向模版
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
