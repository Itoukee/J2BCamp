docker-compose up -d --build
docker-compose run php composer create-project symfony/website-skeleton .
sudo chown -R $USER ../symfony
docker-compose up -d