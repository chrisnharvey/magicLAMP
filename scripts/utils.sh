#!/bin/bash

# The following was taken from great work by Lars (elgohr)
# Copyright (c) 2019 Lars
# https://github.com/elgohr/Publish-Docker-Github-Action

function translateDockerTag() {

  local BRANCH=$(echo ${GITHUB_REF} | sed -e "s/refs\/heads\///g" | sed -e "s/\//-/g")

  if isOnMaster; then

    TAGS="latest"

  elif isGitTag && isSemver "${GITHUB_REF}"; then

    TAGS=$(echo ${GITHUB_REF} | sed -e "s/refs\/tags\///g" | sed -E "s/v?([0-9]+)\.([0-9+])\.([0-9]+)(-[a-zA-Z]+(\.[0-9]+)?)?/\1.\2.\3\4 \1.\2\4 \1\4/g")

  elif isGitTag; then

    TAGS="latest"

  elif isPullRequest; then

    TAGS="${GITHUB_SHA}"

  else

    TAGS="${BRANCH}-dev"

  fi;

}


function isSemver() {

  echo "${1}" | grep -Eq '^refs/tags/v?([0-9]+)\.([0-9+])\.([0-9]+)(-[a-zA-Z]+(\.[0-9]+)?)?$'

}


function isOnMaster() {

  [ "${BRANCH}" = "master" ]

}



function isGitTag() {

  [ $(echo "${GITHUB_REF}" | sed -e "s/refs\/tags\///g") != "${GITHUB_REF}" ]

}



function isPullRequest() {

  [ $(echo "${GITHUB_REF}" | sed -e "s/refs\/pull\///g") != "${GITHUB_REF}" ]

}
