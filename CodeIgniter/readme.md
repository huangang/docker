
## 备注
要保证项目的入口index.php的权限为644

## 运行
docker build -t codeigniter:1.0.0 .
docker run -v /var/apps/your-project:/var/www/app -i -t -d -P -e INIT=bin/setup -e VIRTUAL_HOST=your.domain codeigniter:1.0.0
