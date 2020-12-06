# Release Notes

## [Unreleased](https://github.com/chrisnharvey/magicLAMP/compare/master...develop)

# v1.4.1

### Fixed

- Stable release of PHP 8.0 now included
- Enable imagick extension in PHP 8 container
- Fix broken links in documentation
- Bump Stripe CLI version to v1.5.5
- Bump Digital Ocean CLI version to v1.52.0

## v1.4.0

### New

- PHP 8.0 RC3
- Composer 2

## v1.3.9

### Fixed

- Laravel 8 support

## v1.3.8

### Fixed

- Fix regression from v1.3.7 that caused gd build to fail

## v1.3.7

### Fixed

- GD library in PHP 7.4 now supports png and webp images

## v1.3.6

### Improved

- Documentation updates

## v1.3.5

### Improved

- Documentation and readme updates

## v1.3.4

### Fixed

- Fixed zsh hanging on Windows when trying to get git status ([2717c1f](https://github.com/chrisnharvey/magicLAMP/commit/2717c1fef1e8bc36aca23dee503599ab5cd04739))

## v1.3.3

### Fixed

- Fix issue with workspace Dockerfile ([fd9178f](https://github.com/chrisnharvey/magicLAMP/commit/fd9178f562f67b45ced05a93b2ff9f8b8bdbf195))

## v1.3.2

### Fixed

- Replace Emoji git statuses with ASCII equivalents for compatibility with terminals that don't support Emoji ([c7ea84b](https://github.com/chrisnharvey/magicLAMP/commit/c7ea84be2785ca3821c36199381df325af99aea3))

## v1.3.1

### Fixed

- Path to magicLAMP update script has been fixed ([2f7daaf](https://github.com/chrisnharvey/magicLAMP/commit/2f7daaf6bfbd529e5830ec0603f24431e5b0d0a1))

## v1.2.0

## v1.3.0

### New

- Added ngrok to workspace container ([#33](https://github.com/chrisnharvey/magicLAMP/issues/33), [437e5ce](https://github.com/chrisnharvey/magicLAMP/commit/437e5cea445ecb0bf128f45cdf69ee92ba745ac3))

### Improved

- PHP and Node versions are now shown in shell ([#9](https://github.com/chrisnharvey/magicLAMP/issues/9), [4dfa7b6](https://github.com/chrisnharvey/magicLAMP/commit/4dfa7b6db036be15c25db70079ec76cb18bcfecf))
- Added temporary upgrade script to prevent upgrade issues ([fdd6c98](https://github.com/chrisnharvey/magicLAMP/commit/fdd6c987d353739a54d1852fecd25e28fdcb6d06))

## v1.2.0

### New

- Memcached container is now included ([#24](https://github.com/chrisnharvey/magicLAMP/issues/24), [28aabe0](https://github.com/chrisnharvey/magicLAMP/commit/28aabe0b2a7fd9464406e8101c0fa4a34b6cb45e))
- RabbitMQ container is now included ([#25](https://github.com/chrisnharvey/magicLAMP/issues/25), [37845da](https://github.com/chrisnharvey/magicLAMP/commit/37845da9ba4413a4d87ac8daff9569a9b0fb2f00))
- Memcached extension is now installed for all PHP versions ([2991644](https://github.com/chrisnharvey/magicLAMP/commit/2991644e17e94f4c72520ed918ae3b564ab7e64d))
- DNS resolver is now included ([#26](https://github.com/chrisnharvey/magicLAMP/issues/26), [9efcbfa](https://github.com/chrisnharvey/magicLAMP/commit/9efcbfa2ef24a83f8a3cfcedf105c91cbd546a63))

### Improved

- Git status is now disabled in zsh prompt to prevent hangs on Windows ([#30](https://github.com/chrisnharvey/magicLAMP/issues/30), [5568b8e](https://github.com/chrisnharvey/magicLAMP/commit/5568b8e2afc71d387629a7c5614319311c1b44d7))
- Workspace performance improved and image size reduced by reducing Docker layers ([a97bb17](https://github.com/chrisnharvey/magicLAMP/commit/a97bb17db2f62528966540aec8bf4a6c78f983bd))

### Fixed

- Fixed issue where node and npm would become unavailable when switching PHP version ([#31](https://github.com/chrisnharvey/magicLAMP/issues/31), [2a1c251](https://github.com/chrisnharvey/magicLAMP/commit/2a1c251b1c2ed7399dbabcc9c5071cef4fa1cd06))
- Postgres PHP driver is now included in the workspace ([e3e74f6](https://github.com/chrisnharvey/magicLAMP/commit/e3e74f61f618a0cb9ef1887772228c90d73692f9))

## v1.1.0

### New

- Elasticsearch is now included ([#21](https://github.com/chrisnharvey/magicLAMP/issues/21), [4effd1a](https://github.com/chrisnharvey/magicLAMP/commit/4effd1a97f6faac3b443642ab8f381812913b2b6))

### Improved

- Some containers are now tested automatically ([#16](https://github.com/chrisnharvey/magicLAMP/issues/16), [1735092](https://github.com/chrisnharvey/magicLAMP/commit/17350921bf9a7464c4b85f01d801d661952fbd05), [38f7abb](https://github.com/chrisnharvey/magicLAMP/commit/38f7abb3e40eec5432efb7f2f6201208943249ca), [e8f823b](https://github.com/chrisnharvey/magicLAMP/commit/e8f823b161e80334aac4c161010f6f6c9ef787c8))
- PHP version switcher no longer causes conflicts when run in parallel ([33df08d](https://github.com/chrisnharvey/magicLAMP/commit/33df08da4a57e1a94812aeac1173356f347fff42))

### Fixed

- Swoole is now working in the PHP 7.1 container ([344a5d7](https://github.com/chrisnharvey/magicLAMP/commit/344a5d7433e66f3c7ff94597f4f67fa8e9e37abc))

## v1.0.1

### Fixed

- Fix issue with Postgres container failing to start ([#22](https://github.com/chrisnharvey/magicLAMP/issues/22), [1d719ff](https://github.com/chrisnharvey/magicLAMP/commit/1d719ffb7e97489e273ddb893d6ee2944b1e9ffb))

## v1.0.0

Initial release
