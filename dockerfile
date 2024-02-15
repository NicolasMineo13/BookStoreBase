FROM bookstorebase:1.0

ENV user=ricardo
ENV uid=1000

WORKDIR /var/www/html
COPY ./ ./
COPY .env.docker .env
COPY .env.docker.testing .env.testing

RUN chmod 777 Docker/entrypoint.sh

RUN chmod -R 755 storage/

# Changing the ouwner of these directories so to be able to write in them.
#RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R $user:www-data storage
RUN chown -R $user:www-data bootstrap/cache

# Changing the permissions over these directories.
RUN chmod -R 775 storage
RUN chmod -R 775 bootstrap/cache

EXPOSE 80

#ENTRYPOINT ["Docker/entrypoint.sh"]