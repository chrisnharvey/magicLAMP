# magicLAMP

magicLAMP is a simple docker setup that provides a modern LEMP stack based on official upstream containers.

## Goals of this project

- To use the official upstream containers (where possible) with minimal modifications
- To be easy to modify for your own needs
- To include tools that makes development faster

## Inlcuded

- [x] Nginx
- [x] Automatic virtual hosts
- [x] PHP 5.6 - 7.4
- [x] PHP version changes per-project
- [x] Workspace container with pre-installed dev tools
- [x] NodeJS 10.x
- [x] MySQL
- [x] phpMyAdmin
- [x] PostgreSQL
- [x] pgAdmin4
- [x] Redis
- [x] Auto DNS
- [ ] Local SSL
- [ ] Catch-all email with webmail

## Install

```
git clone https://github.com/chrisnharvey/magicLAMP
cd magicLAMP
cp .env.example .env
```

Now modify the ```.env``` file to suit your needs.

```
docker-compose up -d
```

Now change your DNS server on your host machine to 127.0.0.1.

## Updates

```
cd magicLAMP
git pull
docker-compose build --no-cache
docker-compose up -d
```

## DNS records

The following DNS records are resolved automatically:

- redis.local
- mysql.local
- phpmyadmin.local
- postgres.local
- pgadmin.local

Your projects will be automatically resolved to their respective PHP version as follows:

| URL                 | PHP Verson | Root Directory                  |
| ------------------- | ---------- | ------------------------------- |
| projectname.local56 | 5.6        | PROJECTS_DIR/projectname/public |
| projectname.local70 | 7.0        | PROJECTS_DIR/projectname/public |
| projectname.local71 | 7.1        | PROJECTS_DIR/projectname/public |
| projectname.local72 | 7.2        | PROJECTS_DIR/projectname/public |
| projectname.local73 | 7.3        | PROJECTS_DIR/projectname/public |
| projectname.local74 | 7.4        | PROJECTS_DIR/projectname/public |
