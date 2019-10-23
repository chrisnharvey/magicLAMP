# magicLAMP

magicLAMP is a simple docker setup that provides a modern LEMP stack based on official upstream containers.

## Goals of this project

- To use the official upstream containers with minimal modifications
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
- [ ] PostgreSQL
- [ ] pgAdmin4
- [x] Redis
- [x] Auto DNS
- [ ] Local SSL
- [ ] Catch-all email with webmail

## Install

```
git clone https://github.com/chrisnharvey/magicLAMP
cd magicLAMP
```

Now modify the ```.env``` file

```
docker-compose up -d
```

## Updates

```
cd magicLAMP
git pull
docker-compose build --no-cache
docker-compose up -d
```
