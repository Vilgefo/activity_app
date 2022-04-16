cp -r /usr/src/cache/node_modules/. /var/www/node_modules/
cp -r /usr/src/cache/vendor/. /var/www/vendor/
cd /var/www
php artisan migrate:fresh
apache2-foreground
