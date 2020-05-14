# Automatic DNS

magicLAMP has a built-in DNS resolver which will automatically resolve a number of
```.localhost``` domains to the appropriate magicLAMP container.

## Setup

Simply change the DNS resolver to on your host machine to `127.0.0.1`.

## Automatic PHP version resolution

The most notable use Auto DNS is resolving your projects to the appropriate PHP
version.

You can suffix your project name with ```.[version].localhost```, and it will be resolved
to the correct php-fpm container based on the PHP version you specified in the URL.

For example: ```project.74.localhost``` will be resolved to the nginx container, which
will interpret the PHP version (7.4 in this case) and execute your PHP code using the
correct PHP version.

nginx will try to find your project's document root in the directory specified in the
```PROJECTS_DIR``` variable inside your ```.env``` file. It will use the
```public``` subdirectory in your project folder as the document root.

| URL                     | Document Root                    |
| ----------------------- | -------------------------------- |
| my-project.72.localhost | [PROJECTS_DIR]/my-project/public |
