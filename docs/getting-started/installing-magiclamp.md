# Installing magicLAMP

!!! note "Installing on Windows"
    For performance reasons, we recommend using WSL2 on Windows hosts with Ubuntu 20.04 installed
    Docker Desktop with WSL2 enabled. All `docker` and `docker-compose` commands should be run inside
    Ubuntu 20.04 in WSL. You will be able to access a bash shell for Ubuntu 20.04 from the Windows
    start menu.

Installing magicLAMP is easy.

### Step 1

Run the following commands on your host system.

```
git clone https://github.com/chrisnharvey/magicLAMP
cd magicLAMP
cp .env.example .env
```

### Step 2

Now modify the .env file to suit your needs.

`.env` already provides sane defaults, but you may want to change these to suit
your needs.

!!! note "Windows Users"
    For Windows users, we recommend storing your projects directory inside WSL2.

    [See here](https://magiclamp.app/en/stable/troubleshooting/performance-on-windows) for more information.

### Step 3

Run the following commands to pull down the containers and start them:

```
docker-compose pull
docker-compose up -d
```

### Step 4 (optional)

To take full advantage of magicLAMP, you may want to use [Automatic DNS](https://magiclamp.app/en/stable/automatic-dns)
and [Automatic SSL](https://magiclamp.app/en/stable/automatic-ssl).

See their respective documentation for information on how to set them up.

### You're done

If you have [Automatic DNS](https://magiclamp.app/en/stable/automatic-dns) setup, you can now visit any of your projects
using any PHP version by visiting `<project-name>.<php-version>.localhost` in your browser
(e.g. `my-awesome-project.74.localhost`)

You can also access the [magicLAMP shell](https://magiclamp.app/en/stable/workspace) which by typing `./shell.sh`
(or `.\shell.cmd` on Windows).
