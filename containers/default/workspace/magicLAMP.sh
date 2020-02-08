export SHELL=/bin/zsh
export DEFAULT_USER="$(whoami)"

cat /usr/src/magicLAMP/magicLAMP.art
source /magicLAMP/.env

NEW_VERSION=$DEFAULT_PHP_VERSION
SESSION_SWITCH=1
source /usr/src/magicLAMP/switch-php-version

sudo chown magicLAMP:magicLAMP /home/magicLAMP

cp -n /opt/magicLAMP/zshrc /home/magicLAMP/.zshrc

git config --global user.name "${GIT_NAME}"
git config --global user.email "${GIT_EMAIL}"
