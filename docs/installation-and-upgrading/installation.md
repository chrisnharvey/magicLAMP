# Installation

Installing magicLAMP is as easy.

### Step 1

Run the following commands on your host system.

```
git clone https://github.com/chrisnharvey/magicLAMP
cd magicLAMP
cp .env.example .env
```
### Step 2

Now modify the .env file to suit your needs.

### Step 3

Run the following commands to pull down the containers and start them:

```
docker-compose pull
docker-compose up -d
```