FROM ubuntu:xenial

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
 && apt-get install --yes apache2 \
 && apt-get install --yes php7.0 libapache2-mod-php7.0 php7.0-mcrypt php7.0-mysql

WORKDIR /var/www/html
COPY . .
#VOLUME /var/www/html

EXPOSE 80

CMD ["apachectl","-D","FOREGROUND"]
