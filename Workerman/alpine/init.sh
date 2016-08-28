#!/usr/bin/env bash

ENV=${ENV:-test}
function setEnv()
{
    if [ "$1" == "p1" ] || ["$1" == "p2" ]; then
        cd /app && composer dump-autoload --optimize && composer install --no-dev  && composer dump-autoload --no-dev
    else
        cd /app && composer install  && composer dump-autoload
    fi
}
if [ "$ENV" ];
then
env="$ENV"
else
env="test"
fi
setEnv "$env"
/jsonrpc.sh start $ENV # p1 or p2 or p or test or dev