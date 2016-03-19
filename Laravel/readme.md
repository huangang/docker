
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



