#!/bin/bash

ls -d ${BASH_SOURCE%/*}/../containers/default/* | parallel -j2 ${BASH_SOURCE%/*}/build.sh