#!/bin/bash

. "${BASH_SOURCE%/*}/utils.sh"

translateDockerTag

MAGICLAMP_VERSION=$(echo $TAGS | cut -d ' ' -f 1)

EXIT_CODE=0

cp ${BASH_SOURCE%/*}/../.env.example ${BASH_SOURCE%/*}/../.env

for test_path in ${BASH_SOURCE%/*}/../tests/* ; do
    MAGICLAMP_VERSION=$MAGICLAMP_VERSION GOSS_FILES_PATH="${test_path}" dcgoss run "$(basename $test_path)"

    if [ "$?" -ne 0 ] ; then
        EXIT_CODE=1
    fi
done

exit $EXIT_CODE