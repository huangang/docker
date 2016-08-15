本配置lumen和laravel均适用
### build
    docker build -t alpine-laravel:5.2 .  
### run
    docker run -v $(pwd):/app -itd -P alpine-laravel:5.2