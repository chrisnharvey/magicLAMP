export SHELL=/bin/bash

cat /etc/magicLAMP.art

source /magicLAMP/.env

sudo chown magicLAMP:magicLAMP /home/magicLAMP
sudo touch /home/magicLAMP/.bash_history
sudo chown magicLAMP:magicLAMP /home/magicLAMP/.bash_history

sudo update-alternatives --set php "/usr/bin/php${DEFAULT_PHP_VERSION}" &> /dev/null
sudo update-alternatives --set phar "/usr/bin/phar${DEFAULT_PHP_VERSION}" &> /dev/null
sudo update-alternatives --set phar.phar "/usr/bin/phar.phar${DEFAULT_PHP_VERSION}" &> /dev/null
sudo update-alternatives --set phpize "/usr/bin/phpize${DEFAULT_PHP_VERSION}" &> /dev/null
sudo update-alternatives --set php-config "/usr/bin/php-config${DEFAULT_PHP_VERSION}" &> /dev/null

git config --global user.name "${GIT_NAME}"
git config --global user.email "${GIT_EMAIL}"
