# Quick Start

Now you have successfully installed magicLAMP, here are some quick tips on getting started.

## Accessing your projects

Your projects will be automatically resolved to their respective PHP version as follows:

| URL                      | PHP Verson | Root Directory                  |
| ------------------------ | ---------- | ------------------------------- |
| projectname.56.localhost | 5.6        | PROJECTS_DIR/projectname/public |
| projectname.70.localhost | 7.0        | PROJECTS_DIR/projectname/public |
| projectname.71.localhost | 7.1        | PROJECTS_DIR/projectname/public |
| projectname.72.localhost | 7.2        | PROJECTS_DIR/projectname/public |
| projectname.73.localhost | 7.3        | PROJECTS_DIR/projectname/public |
| projectname.74.localhost | 7.4        | PROJECTS_DIR/projectname/public |
| projectname.80.localhost | 8.0        | PROJECTS_DIR/projectname/public |
| projectname.81.localhost | 8.1        | PROJECTS_DIR/projectname/public |

## Accessing services

The following DNS records are resolved to their respective service automatically:

- redis.localhost
- mysql.localhost
- elasticsearch.localhost
- rabbitmq.localhost
- memcached.localhost
- phpmyadmin.localhost
- postgres.localhost
- pgadmin.localhost
- mailcatcher.localhost
- chrome.localhost
- firefox.localhost

## Accessing the workspace

You can access the workspace by running `./shell.sh` on Linux and macOS, or `.\shell.cmd` on Windows.

When starting the shell, you will automatically end up in your projects directory.

## Switching PHP version in the workspace

Switching PHP versions in the workspace is easy.

### For a single command

Simply prefix your command with the PHP version you would like to use.

```
7.4 composer install
```

### For your entire shell session

If you're going to be working with a specific PHP version in the workspace, instead of
prefixing every command with the PHP version, run `. <php-version>`

```
. 7.4
```