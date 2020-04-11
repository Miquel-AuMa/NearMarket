git pull origin master
docker-compose build php
docker-compose up  -d --force-recreate php
docker-compose exec -T php composer install
docker-compose exec -T php php artisan migrate
