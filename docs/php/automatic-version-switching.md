# Automatic version switching

magicLAMP can switch PHP version automatically based on your project settings.
This can be done by adding a `.magiclamprc` file to your project directory with
the following contents.

```
PHP_VERSION=7.4
```

Now every time you enter your projects directory (or any of its sub-directories),
your PHP version will automatically switch to the version set in the `.magiclamprc`
file.

When you leave your project directory, the PHP version will switch back to its
previous setting automatically.

## Disabling this feature

This feature can be disabled by setting `AUTO_SWITCH_PHP` to `0` in your
magicLAMP `.env` file.