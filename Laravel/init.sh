#!/bin/bash
chmod 777 -R /var/www/app/storage/
chmod 777 -R /var/www/app/bootstrap/cache
env=${ENV:-test}#p or test or dev
if [ "$env" = "p" ] || [ "$env" = "pro" ] || [ "$env" = "production" ];then
   cd /var/www/app && /usr/bin/composer dump-autoload --optimize && /usr/bin/composer install --no-dev && /usr/bin/composer update --no-dev && /usr/bin/composer dump-autoload --no-dev
   else
   cd /var/www/app && /usr/bin/composer install  && /usr/bin/composer update && /usr/bin/composer dump-autoload
fi

