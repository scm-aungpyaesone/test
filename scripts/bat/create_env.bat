:: create .env file.
copy %cd%\laravel\.env.example %cd%\laravel\.env

:: artisan key generate.
docker-compose exec php-fpm php artisan key:generate