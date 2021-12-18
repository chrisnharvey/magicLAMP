#!/bin/bash

export $(egrep -v '^#' .env | xargs)

composedStack="docker-compose -f docker-compose.yml"

STACKS=($STACK_WEBSERVER, $STACK_PHP $STACK_DATABASES $STACK_MOCKS $STACK_GUIS $STACK_ETC)

for stack in ${STACKS[@]}; do
    for container in ${stack//,/ }
    do
        composedStack="$composedStack -f ./compose/docker-compose.$container.yml"
    done
done

composedStack="$composedStack up --detach"

eval $composedStack
