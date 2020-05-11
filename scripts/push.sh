#!/bin/bash

. "${BASH_SOURCE%/*}/utils.sh"

translateDockerTag

for container_path in ${BASH_SOURCE%/*}/../containers/default/* ; do

    container_name="chrisnharvey/magiclamp-$(basename $container_path)"

    for TAG in ${TAGS}
    do
        docker push "${container_name}:${TAG}"
    done

done