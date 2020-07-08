## artisan migrate and seed.
docker-compose exec php-fpm php artisan migrate:refresh --seed

## artisan passport install.
docker-compose exec php-fpm php artisan passport:install --force
