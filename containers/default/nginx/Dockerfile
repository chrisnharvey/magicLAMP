FROM nginx:latest

ADD ./config/nginx.conf /etc/nginx/conf.d/vhosts.conf
ADD ./config/ssl.ext /etc/nginx/ssl.ext

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -qq openssl && \
    mkdir /ca

ADD start.sh /start.sh

CMD /bin/bash /start.sh