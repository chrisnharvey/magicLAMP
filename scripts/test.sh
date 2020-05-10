#!/bin/bash

EXIT_CODE=0

for test_path in ${BASH_SOURCE%/*}/../tests/* ; do
    GOSS_FILES_PATH="${test_path}" dcgoss run "$(basename $test_path)"

    if [ "$?" -ne 0 ] ; then
        EXIT_CODE=1
    fi
done

exit $EXIT_CODE