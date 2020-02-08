FROM nginx:latest

RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq openssl

RUN mkdir /ca

ADD start.sh /start.sh

CMD /bin/bash /start.sh