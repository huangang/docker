#!/bin/sh
cd /app && npm install && npm run compile && pm2-docker start pm2.json