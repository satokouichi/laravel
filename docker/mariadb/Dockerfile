ARG MARIADB_VERSION
FROM mariadb:${MARIADB_VERSION}

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod -R 644 /etc/mysql/conf.d/my.cnf
