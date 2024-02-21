#!/bin/bash

source funciones.sh

APP_NAME=${DC_APP_NAME} APP_PORT_HTTPS=${DC_APP_PORT_HTTPS} APP_PORT_HTTP=${DC_APP_PORT_HTTP} docker-compose -p "${DC_APP_NAME}" -f docker-compose.yml down

sleep 2s
printf "\n\n\e[32mListado de contenedores:\n\n\e[39m"
docker ps -a
# printf "\n\n\e[32mListado de imágenes\n\n\e[39m"
# docker images
