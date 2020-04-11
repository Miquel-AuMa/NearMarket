git pull origin master
docker-compose build php
docker-compose up php --force-recreate -d
docker-compose exec -T php composer install
docker-compose exec -T php php artisan migrate
