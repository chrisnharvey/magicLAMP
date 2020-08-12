# magicLAMP CLI

The magicLAMP workspace has a built in command line application to
assist you in exposing ports, editing config files, and much more.

## Checking for updates

You can check to see if there is an update for magicLAMP by running
the following commnad.

```
magiclamp update-check
```

## Exposing ports

Sometimes you may need to expose a port from a magicLAMP container
to your host.

You can expose any port from any magicLAMP container to your host
by running the following command.

```
magiclamp expose <port> <container>
```

If no container is specified, the port will be exposed from the workspace.

For example, if you need to expose port `3000` from the workspace to your
host. You can run the following commnad:

```
magiclamp expose 3000
```

Or if you need to expose port `9000` from your PHP 7.4 container, you can run
the following commnad:

```
magiclamp expose 9000 php74
```

## Editing container files

Sometimes you may want to modify the configuration files for the services that
run in the magicLAMP container.

You can do this by running the following command:

```
magiclamp edit <container> <file>
```

For example, if you need to edit the php.ini file in the PHP 7.4 container, you
can run the following command:

```
magiclamp edit php74 /etc/php/php.ini
```

## Running commands in magicLAMP containers

If you need to run a command in a magicLAMP container, you can do so by running
the following command:

```
magiclamp run <container> "<command>"
```

For example, if you need to see the PHP configuration in the PHP 7.4 container,
you can run the following command:

```
magiclamp run php74 "php -i"
```

## Shell into magicLAMP containers

If you need to access the shell for a magicLAMP container, you can do so by
running:

```
magiclamp shell <container>
```

This can be useful if you need to debug something that is running in a
magicLAMP container.