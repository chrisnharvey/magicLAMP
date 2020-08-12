# Set default shell to zsh
export SHELL=/bin/zsh

# Set deault user to magicLAMP
export DEFAULT_USER="magicLAMP"

# Show the magicLAMP welcome screen
magiclamp welcome

# Make .env vars available in the shell
source /magicLAMP/.env

# Set the active PHP version to the default specified in .env
NEW_VERSION=$DEFAULT_PHP_VERSION
SESSION_SWITCH=1
source /usr/src/magicLAMP/switch-php-version

# Set user git configs from .env file
git config --global user.name "${GIT_NAME}"
git config --global user.email "${GIT_EMAIL}"

# Path to your oh-my-zsh installation.
export ZSH="/opt/magicLAMP/oh-my-zsh"

# Set default theme to magiclamp
ZSH_THEME="minima"

# Uncomment the following line to automatically update without prompting.
DISABLE_UPDATE_PROMPT="true"

# Uncomment the following line if you want to disable marking untracked files
# under VCS as dirty. This makes repository status check for large repositories
# much, much faster.
DISABLE_UNTRACKED_FILES_DIRTY="true"

# Which plugins would you like to load?
# Standard plugins can be found in ~/.oh-my-zsh/plugins/*
# Custom plugins may be added to ~/.oh-my-zsh/custom/plugins/
# Example format: plugins=(rails git textmate ruby lighthouse)
# Add wisely, as too many plugins slow down shell startup.
plugins=(git zsh-autosuggestions zsh-syntax-highlighting laravel node npm magiclamp)

source $ZSH/oh-my-zsh.sh

# Set default editor to nano for simplicity
export EDITOR='nano'

# zsh prompt order
MINIMA_PROMPT_ORDER=(
    php
    node
    git_branch
    dir
    exit_code
    char
)

# zsh theme config
MINIMA_PHP_SYMBOL="PHP "
MINIMA_PHP_COLOR="cyan"
MINIMA_PHP_PREFIX=""
MINIMA_NODE_SYMBOL="Node "
MINIMA_NODE_PREFIX=""
MINIMA_GIT_BRANCH_SYMBOL=""
MINIMA_GIT_STATUS_SYMBOL_RENAMED="&"
MINIMA_GIT_STATUS_SYMBOL_DELETED="x"
MINIMA_GIT_STATUS_SYMBOL_AHEAD=">"
MINIMA_GIT_STATUS_SYMBOL_BEHIND="<"
MINIMA_CHAR_SYMBOL="$"
MINIMA_DIR_PREFIX=""
MINIMA_DIR_COLOR="yellow"
MINIMA_EXIT_CODE_SYMBOL="Exit: "

# nvm
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion
