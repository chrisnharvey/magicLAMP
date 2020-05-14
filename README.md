<p align="center"><a href="https://magiclamp.app" target="_blank" rel="noopener"><img src="https://res.cloudinary.com/chrisnharvey/image/upload/v1589481387/magicLAMP_rdth7y.svg" width="400"></a></p>

<p align="center">
<a href="https://github.com/chrisnharvey/magicLAMP/actions"><img src="https://img.shields.io/github/workflow/status/chrisnharvey/magicLAMP/Build/master" alt="Build status"></a>
<a href="http://magiclamp.app/en/stable/?badge=stable"><img src="https://readthedocs.org/projects/magiclamp/badge/?version=stable" alt="Documentation Status"></a>
<a href="https://twitter.com/chrisnharvey"><img src="http://img.shields.io/badge/author-@chrisnharvey-blue.svg?style=square" alt="Author"></a>
<a href="https://twitter.com/chrisnharvey"><img src="https://img.shields.io/github/v/release/chrisnharvey/magicLAMP" alt="Latest version"></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=square" alt="License"></a>
</p>

## About magicLAMP

magicLAMP is a full PHP development environment that works like magic! ✨

- 🤩 Run **multiple PHP versions** (5.6 - 7.4) at the same time (no more restarting, or rebuilding)
- 🙌 **Automatic DNS resolution** (bye-bye `hosts` file)
- 🚀 **Automatic Virtual Host creation** (forget `apache.conf` or `nginx.conf`)
- 🔒 **Automatic and valid SSL certificates** (mixed content errors are a thing of the past)
- 💾 Pre-configured databases that are ready to use - **MySQL** - **PostgreSQL** - **Redis** - **Memcached**
- 📋 Pre-configured database management tools - **pgAdmin 4** - **phpMyAdmin** - **redis-cli**
- ✉️ Catch all **SMTP mail server with webmail** for testing emails locally
- 🔨 **Powerful workspace** with pre-installed dev tools
- 👀 **Selenium** for Firefox and Chrome with VNC access
- 🙏 Switchable versions of **NodeJS and npm** with **nvm**
- 🔍 Built-in **ElasticSearch**
- 🐇 Built-in **RabbitMQ** with management GUI
- ✅ **So much more**

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
- elasticsearch.localhost
- rabbitmq.localhost
- memcached.localhost
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
