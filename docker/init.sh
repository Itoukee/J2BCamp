docker-compose up -d --build
docker-compose run php composer create-project symfony/website-skeleton .
sudo chown -R $USER ../symfony
docker-compose up -d
docker-compose run php ./bin/console cache:clear --no-warmup --env=prod
docker-compose run php ./bin/console cache:clear --no-warmup --env=dev
docker-compose run php ./bin/console cache:warmup --env=prod
docker-compose run php ./bin/console cache:warmup --env=dev
sudo chmod -R 777 ../symfony/var/cache
sudo chmod -R 777 ../symfony/var/log