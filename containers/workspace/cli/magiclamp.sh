#!/bin/bash

if [ "$EUID" -ne 0 ] ; then
    SUDO="sudo -E"
fi

$SUDO 7.4 /usr/src/magicLAMP/magiclamp $@

exit $?
