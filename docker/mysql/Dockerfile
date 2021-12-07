FROM mysql
ENV MYSQL_ALLOW_EMPTY_PASSWORD 'yes'
ENV MYSQL_DATABASE "j2b"

ADD init.sql /docker-entrypoint-initdb.d

EXPOSE 3306