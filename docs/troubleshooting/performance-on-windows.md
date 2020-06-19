# Performance on Windows

Depending on your setup, you may experience performance issues when using magicLAMP on Windows.
This is usually caused by mounting your `PROJECTS_DIR` from your Windows host instead of through
the Linux VM that is included in WSL2.

To resolve this issue, you need to keep your projects directory inside of WSL2 and not on your host system.

## Storing projects in WSL2

!!! note
    After following this guide, all `docker` and `docker-compose` commands
    must be run inside of Ubuntu 20.04.

    This is to ensure your projects directory is correctly mounted.

### Prerequisites

- WSL2 installed and enabled in Docker Desktop
- WSL2 version of Ubuntu 20.04 installed from Microsoft Store

### Creating the projects directory

Open "Ubuntu 20.04" from the start menu in Windows. This will give you a bash shell
inside of Ubuntu 20.04.

Once you're in here, run the following commands.

```
sudo mkdir /projects
sudo chown -R 1000:1000 /projects
```

### Accessing Linux files in Windows

You can access the files in your WSL2 distro using the Windows File Explorer.
Depending on how up-to-date your version of Windows is, these will either show up
under a "Linux" heading in the sidebar, or you can get to them manually by typing
`\\wsl$` in the file path of Windows Explorer.

Once you can see the network shares, you will need to enter the Ubuntu-20.04 share to
access the filesystem of Ubuntu 20.04. In here, you should see the `projects` folder you
just created.

![WSL2 Network Share](https://res.cloudinary.com/chrisnharvey/image/upload/v1592596006/wsl2_lxygj8.png)

If you already have your project files stored in a previous location, you can copy them into this folder.

### Update .env

You now need to update your `.env` file to point `PROJECTS_DIR` to your projects
folder that is now stored in WSL2.

Based on the previous step, your projects will now be stored in `/projects`, so update
your the `PROJECTS_DIR` variable in `.env` to match.

```
PROJECTS_DIR=/projects
```

### Restart magicLAMP

You now need to restart magicLAMP for these changes to take effect.

You must now run all `docker` and `docker-compose` commands inside of Ubuntu 20.04.

`cd` into the path where you installed magicLAMP. Windows drives can be found in `/mnt`
(e.g. `/mnt/c/Users/Chris/magicLAMP`).

```
docker-compose down
docker-compose up -d
```

## Working on projects stored in WSL2

Now that your projects are stored inside WSL2, you will need to work on these from the WSL2
network share.

You should be able to import your projects from this network share into your preferred IDE.