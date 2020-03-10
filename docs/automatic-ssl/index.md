# Automatic SSL

When you start magicLAMP for the first time, we'll automatically generate an
SSL certificate authority and a wildcard SSL certificate for all PHP versions
(e.g. ```*.74.localhost```, ```*.73.localhost```).

You can then import the magicLAMP certificate authority (```data/ca/magiclamp-ca.pem```)
into your browser which will enable valid SSL on all your projects.

## Security

The magicLAMP certificate authority and certificates are generated when you first
start magicLAMP, which makes them unique to your machine, and they are **not** shared
with other magicLAMP users.

However, it is important to keep your certificate keys safe. Should your keys become
compromised, someone could use them to sign valid certificates for any domain. this
means that it would become possible for an attacker with access to your private keys
to perform a man-in-the-middle attack on domains protected with SSL.

If you think your key has been compromised, remove the CA from your web browser, stop
magicLAMP using ```docker-compose stop``` and delete the ```data/ca``` directory. When
you start magicLAMP again, a new certificate authority and SSL certificate will be
generated, which you can then import into your browser again.