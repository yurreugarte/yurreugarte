#!/bin/bash

source funciones.sh

# Start service
service docker start
sleep 4s

# Define scripts' names
crear_estructura="./$CURRENT_PATH/crear_estructura.sh"

# Give permissions to all the installation scripts
chmod +x $crear_estructura

# Crear estructura
bash $crear_estructura

# # Retocar docker-compose.yml. Establecer nombre de servicio directamente en archivo docker-compose.hml porque no se puede pasar como variable.
# docker_compose_nombre_servicio $DC_APP_NAME

# Comprobar si hay otro contenedor en el puerto 443. Si lo hay se asigna otro puerto.
OCUPADO_PUERTO_443=$(consulta_puerto_ocupado "443")

if [ $OCUPADO_PUERTO_443 = "1" ]
then
    read -p "Los puertos ${DC_APP_PORT_HTTP} y ${DC_APP_PORT_HTTPS} ya están ocupados. ¿Quieres levantar el contenedor en otros puertos? (s/n)" RESPUESTA_USUARIO_PUERTO
fi

if [[ $RESPUESTA_USUARIO_PUERTO = "s" && $OCUPADO_PUERTO_443 = "1" ]]
then
    DC_APP_PORT_HTTPS="9876"
    DC_APP_PORT_HTTP="8876"
    OCUPADO_PUERTO_SIGUIENTE=$(consulta_puerto_ocupado ${DC_APP_PORT_HTTPS})
    while [ $OCUPADO_PUERTO_SIGUIENTE = "1" ]
    do
        printf "sartu da\n"
        ((DC_APP_PORT_HTTPS=DC_APP_PORT_HTTPS+1))
        ((DC_APP_PORT_HTTP=DC_APP_PORT_HTTP+1))
        OCUPADO_PUERTO_SIGUIENTE=$(consulta_puerto_ocupado ${DC_APP_PORT_HTTPS})
    done
    printf "\n\n\e[31mEl contenedor se lanzará en los puertos http://localhost:${DC_APP_PORT_HTTP}/ y https://localhost:${DC_APP_PORT_HTTPS}/\n\n\e[39m"
fi

# Run containers
if [ $RESPUESTA_USUARIO_PUERTO = "s" ]
then
    APP_NAME=${DC_APP_NAME} APP_PORT_HTTPS=${DC_APP_PORT_HTTPS} APP_PORT_HTTP=${DC_APP_PORT_HTTP} docker-compose -p "${DC_APP_NAME}" -f  docker-compose.yml up -d && printf "\n\n\e[32mLanzando contenedores...\e[39m"
fi

sleep 2s
printf "\n\n\e[32mListado de contenedores:\n\n\e[39m"
docker ps -a
# printf "\n\n\e[32mLogs servidor web:\n\n\e[39m"
# docker logs ${DC_APP_NAME}