## clear config cache
docker-compose exec php-fpm php artisan config:cache
## generate API_Key for testing env
docker-compose exec php-fpm php artisan key:generate --env=testing
## start testing
docker-compose exec php-fpm php artisan test --env=testing