#!/bin/bash
cd /var/www/service
ENV=${ENV:-test}
./jsonrpc.sh start $ENV # p1 or p2 or p or test or dev