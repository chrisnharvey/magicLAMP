# Custom stack

The `.env.example` contains `STACK_` variables which determain which containers are started when you run `./stack.sh`

These are comma seperated lists of containers you want in your stack.

For example, to setup a minimal LEMP stack, use:

```
STACK_WEBSERVER=nginx
STACK_PHP=php80
STACK_DATABASES=mysql
```
