#!/bin/bash

ls -d ${BASH_SOURCE%/*}/../containers/* | ${BASH_SOURCE%/*}/build.sh