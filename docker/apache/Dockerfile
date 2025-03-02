FROM httpd:2.4

RUN apt-get update -y
RUN apt-get install -y openssl

RUN mkdir -p /usr/local/apache2/conf/extra/ssl
RUN openssl genrsa 2048 > server.key
RUN openssl req -new -key server.key -subj "/C=JP/ST=Tokyo/L=Chuo-ku/O=RMP Inc./OU=web/CN=localhost" > server.csr
RUN openssl x509 -in server.csr -days 3650 -req -signkey server.key > server.crt
RUN cp server.crt /usr/local/apache2/conf/extra/ssl/server.crt
RUN cp server.key /usr/local/apache2/conf/extra/ssl/server.key
RUN chmod 755 -R /usr/local/apache2/conf/extra/ssl
RUN chmod 400 /usr/local/apache2/conf/extra/ssl/server.key

COPY httpd.conf /usr/local/apache2/conf/httpd.conf
COPY extra/*.conf /usr/local/apache2/conf/extra