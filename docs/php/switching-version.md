# Switching PHP version

You can switch the PHP version for any project, using Auto DNS. You can also switch your
PHP version in the workspace.

## Switching PHP version in the browser

Simply visit the correct URL for your desired PHP version. The URL format is:
```http://project-name.php-version.localhost```. This will automatically resolve
to the ```public/``` directory in your project folder.

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

## Switching PHP version in the workspace

You may want to change your PHP version in the workspace so you can run any PHP commands
using the correct version for your project.

### Changing for a single command

You can change the PHP version for a single command by prefixing your command with the PHP version
you want to run it as.

```
7.4 composer install
```

### Changing for the workspace session

You can change the PHP version for the entire workspace session. This will allow you to run any PHP command
without prefixing it with the version number. Just run the same command as before, but prefix it with ```. ```

```
. 7.4
composer install
```

### Changing the default PHP version

It can be annoying to have to select the PHP version every time you use the workspace. So if you want to set
the default PHP version, just set the ```DEFAULT_PHP_VERSION``` environment variable in the ```.env``` file.