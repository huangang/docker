#!/bin/sh
cd /app && npm run compile && pm2 reload api