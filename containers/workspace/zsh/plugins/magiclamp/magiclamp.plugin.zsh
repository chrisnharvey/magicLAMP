load_magiclamp()
{
    local magiclamprc="$(find_magiclamprc)"
    local switch_php=0

    if [ -f "$magiclamprc" ]; then
        source $magiclamprc

        if [ "$PHP_VERSION" ]; then
            switch_php=1
        fi
    fi

    if [ $switch_php = "0" ]; then
        PHP_VERSION=$DEFAULT_PHP_VERSION
    fi

    if [ "$PHP_VERSION" != "$OLD_PHP_VERSION" ]; then
        SESSION_SWITCH=1
        NEW_VERSION=$PHP_VERSION

        source /usr/src/magicLAMP/switch-php-version

    fi
}

find_magiclamprc() {
  local dir
  dir="$(find_magiclamprc_up '.magiclamprc')"
  if [ -e "${dir}/.magiclamprc" ]; then
    echo "${dir}/.magiclamprc"
  fi
}

find_magiclamprc_up() {
  local path_
  path_="${PWD}"
  while [ "${path_}" != "" ] && [ ! -f "${path_}/${1-}" ]; do
    path_=${path_%/*}
  done
  echo "${path_}"
}

autoload -U add-zsh-hook
add-zsh-hook precmd load_magiclamp
load_magiclamp
