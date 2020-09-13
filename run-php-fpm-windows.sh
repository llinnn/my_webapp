docker rm -f php-fpm
docker run -d \
    --name php-fpm \
    -v /c/web/web4/:/var/www/html \
    pipekung/php-fpm:7.4-alpine