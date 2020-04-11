# Visual Studio Code

magicLAMP can be integrated nicely into VSCode using extensions.

## Run PHPUnit in the workspace container

When running PHPUnit, you may want to run it inside the magicLAMP workspace container.
Doing this will allow you to take advantage of the PHP version switching and the installed
extensions in magicLAMP.

If you're using the [Better PHPUnit](https://marketplace.visualstudio.com/items?itemName=calebporzio.better-phpunit)
extension, then you can run your PHPUnit tests through the magicLAMP workspace container by adding the following
to your VSCode `settings.json` file.

```json
"better-phpunit.docker.enable": true,
"better-phpunit.docker.command": "docker exec magiclamp_workspace_1 bash -c \"cd ${workspaceFolderBasename}; ",
"better-phpunit.commandSuffix": "\"",
"better-phpunit.docker.paths": {
    "~/Projects": "/projects"
}
```

_**Note:**_ You may need to update your `better-phpunit.docker.paths` key to match the location of your projects
directory on the host system.
