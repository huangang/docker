#!/usr/bin/env bash

port=20160

action=$1

env=$2

if [ x"$action" = "x" ];then
    echo "请指定 start | stop | restart | reload";
    exit;
fi

if [ x"$env" = "x" ];then
    echo "请指定环境变量："
    echo "dev       -- 测试环境"
    echo "test      -- 预发环境"
    echo "p1  -- 线上环境1"
    echo "p2  -- 线上环境2";
    exit;
fi

environment=''
if [ "$env" = "dev" ];then
    environment=development
fi
if [ "$env" = "test" ];then
    environment=testing
fi
if [ "$env" = "p1" ];then
    environment=production
fi
if [ "$env" = "p2" ];then
    environment=production
fi

if [ x"$environment" = "x" ];then
    echo "环境参数出错，支持 dev | test | p1 | p2"
    exit 1
fi

case $action in
	start)
	    cd /app && php start.php start -d $port $environment
	;;
    reload)
        cd /app && php start.php reload -d $port $environment
    ;;
	stop)
	    kill `ps aux | grep "php start.php start -d $port $environment" | awk '{print $2}'`
	;;
	*) echo "INVALID NUMBER!" ;;
esac