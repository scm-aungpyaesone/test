## create .env file.
cp laravel/.env.example laravel/.env
## artisan key generate.
docker-compose exec php-fpm php artisan key:generate