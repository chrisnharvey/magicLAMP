#!/bin/bash

. "${BASH_SOURCE%/*}/utils.sh"

translateDockerTag

for container_path in ${BASH_SOURCE%/*}/../containers/default/* ; do

    container_name="chrisnharvey/magiclamp-$(basename $container_path)"

    BUILD_TAGS=""

    for TAG in ${TAGS}
    do
      BUILD_TAGS="${BUILD_TAGS}-t ${container_name}:${TAG} "
    done

    docker build ${BUILD_TAGS} ${container_path}

    for TAG in ${TAGS}
    do
      docker push "${container_name}:${TAG}"
    done

done
