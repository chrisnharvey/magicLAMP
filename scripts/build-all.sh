#!/bin/bash

ls -d ${BASH_SOURCE%/*}/../containers/default/* | ${BASH_SOURCE%/*}/build.sh