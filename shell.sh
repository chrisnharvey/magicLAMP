#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

docker-compose exec -e MAGICLAMP_HOST_DIR=$DIR -u magicLAMP workspace /bin/zsh

REVIVE="$DIR/.revive"

if [ -f "$REVIVE" ]; then
    rm -f "$REVIVE"
    ./stack.sh -d
    ./shell.sh
fi
