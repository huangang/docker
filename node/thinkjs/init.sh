#!/bin/sh
cd /app && npminstall && pm2-docker start pm2.json