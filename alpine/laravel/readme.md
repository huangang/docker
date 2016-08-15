本配置lumen和laravel均适用
### build
    docker build -t laravel-alpine:1.0.0 .  
### run
    docker run -v $(pwd):/app -itd -P laravel-alpine:1.0.0