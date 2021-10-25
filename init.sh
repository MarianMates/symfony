#!/bin/bash

success=`tput setaf 2`
fail=`tput setaf 1`

echo $success"Starting environment setup"

docker-compose up --build -d

