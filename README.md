# magicLAMP

[![Build Status](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2Fchrisnharvey%2FmagicLAMP%2Fbadge&style=flat-square)](https://github.com/chrisnharvey/magicLAMP/actions)
[![Author](http://img.shields.io/badge/author-@chrisnharvey-blue.svg?style=flat-square)](https://twitter.com/chrisnharvey)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

magicLAMP is a simple docker setup that provides a modern LEMP stack based on official upstream containers.

## Goals of this project

- To use the official upstream containers (where possible) with minimal modifications
- To be easy to modify for your own needs
- To include tools that makes development faster

## Features

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
- [x] Automatic Local SSL
- [x] Catch-all email with webmail (Mailcatcher)
- [x] Stripe CLI
- [x] Save shell history and contents of home directory
- [x] Selenium with VNC access for Chrome and Firefox
- [x] Ability to change/override config files
- [ ] Xdebug

## Install

```
git clone https://github.com/chrisnharvey/magicLAMP
cd magicLAMP
cp .env.example .env
```

Now modify the ```.env``` file to suit your needs.

```
docker-compose pull
docker-compose up -d
```

Now change your DNS server on your host machine to 127.0.0.1.

## Updates

```
cd magicLAMP
git pull
docker-compose pull
docker-compose up -d
```

## DNS records

The following DNS records are resolved automatically:

- redis.localhost
- mysql.localhost
- phpmyadmin.localhost
- postgres.localhost
- pgadmin.localhost
- mailcatcher.localhost
- chrome.localhost
- firefox.localhost

Your projects will be automatically resolved to their respective PHP version as follows:

| URL                      | PHP Verson | Root Directory                  |
| ------------------------ | ---------- | ------------------------------- |
| projectname.56.localhost | 5.6        | PROJECTS_DIR/projectname/public |
| projectname.70.localhost | 7.0        | PROJECTS_DIR/projectname/public |
| projectname.71.localhost | 7.1        | PROJECTS_DIR/projectname/public |
| projectname.72.localhost | 7.2        | PROJECTS_DIR/projectname/public |
| projectname.73.localhost | 7.3        | PROJECTS_DIR/projectname/public |
| projectname.74.localhost | 7.4        | PROJECTS_DIR/projectname/public |
