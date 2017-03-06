#!/bin/sh
cd /app && npm install --production && pm2-docker start pm2.json