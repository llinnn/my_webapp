docker rm -f nginx
docker run -d \
    --name nginx \
    -p 8888:80 \
    -v $PWD:/var/www/html \
    -v $PWD/nginx/conf.d/:/etc/nginx/conf.d/ \
    --link php-fpm \
    nginx:1.19-alpine
