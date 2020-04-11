git pull origin master
docker run --rm  -v $(pwd):/var/www/app node:10  bash -c  "cd /var/www/app && npm install && npm run build"