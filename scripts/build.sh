#!/bin/bash

. "${BASH_SOURCE%/*}/utils.sh"

translateDockerTag

container_path="$1"
container_name="chrisnharvey/magiclamp-$(basename $container_path)"

BUILD_TAGS=""

for TAG in ${TAGS}
do
    BUILD_TAGS="${BUILD_TAGS}-t ${container_name}:${TAG} "
done

docker build ${BUILD_TAGS} ${container_path}
