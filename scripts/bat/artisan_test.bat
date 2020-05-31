:: clear config cache
docker-compose exec php-fpm php artisan config:cache

:: start testing
docker-compose exec php-fpm php artisan test