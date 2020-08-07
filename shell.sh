#!/bin/bash

DIR=`dirname $0`

docker-compose exec -u magicLAMP workspace /bin/zsh

REVIVE="$DIR/.revive"

if [ -f "$REVIVE" ]; then
    rm -f "$REVIVE"
    docker-compose up -d
    ./shell.sh
fi
