#!/bin/bash
chmod 777 -R /var/www/app/storage/
chmod 777 -R /var/www/app/bootstrap/cache
cd /var/www/app && /usr/bin/composer install  && /usr/bin/composer update