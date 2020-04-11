git pull origin master
docker-compose exec -T php composer install
docker-compose exec -T php php artisan migrate
