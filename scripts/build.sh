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

VERSION=$(echo $TAGS | cut -d " " -f1)

docker build --build-arg magiclamp_version=${TAG} ${BUILD_TAGS} ${container_path}
