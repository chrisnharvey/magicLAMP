#!/bin/bash

if [ ! -f /ca/magiclamp-ca.key ]; then
    openssl genrsa -des3 -out /ca/magiclamp-ca.key -passout pass:magiclamp 2048
    openssl req -x509 -new -nodes -key /ca/magiclamp-ca.key -sha256 -days 365 -subj '/CN=magicLAMP/O=magicLAMP/C=US' -out /ca/magiclamp-ca.pem -passin pass:magiclamp
fi

openssl genrsa -out /ca/magiclamp.key 2048
openssl req -new -key /ca/magiclamp.key -subj '/CN=magicLAMP/O=magicLAMP/C=US' -out /ca/magiclamp.csr
openssl x509 -req -in /ca/magiclamp.csr -CA /ca/magiclamp-ca.pem -CAkey /ca/magiclamp-ca.key -CAcreateserial -out /ca/magiclamp.crt -days 365 -sha256 -extfile /etc/nginx/ssl.ext -passin pass:magiclamp

exec nginx -g 'daemon off;'
