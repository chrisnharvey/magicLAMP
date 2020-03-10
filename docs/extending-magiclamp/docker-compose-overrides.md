# Docker Compose Overrides

Pretty much everything in magicLAMP can be overridden or extended.

The simplest way to do this is through the
[docker-compose.override.yml](https://docs.docker.com/compose/extends/) file.

magicLAMP provides an example ```docker-compose.override.yml``` which is located
in ```docker-compose.override.example.yml```. Just copy this file and modify it to
suit your needs. It will be automatically detected by ```docker-compose``` and used
automatically.

You can use the ```docker-compose.override.yml``` file to expose additional ports,
replace config files, or even use a different ```Dockerfile``` for each container.

