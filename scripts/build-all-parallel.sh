#!/bin/bash

ls -d ${BASH_SOURCE%/*}/../containers/* | parallel -j2 ${BASH_SOURCE%/*}/build.sh