# Variables configuración
CURRENT_PATH=$(dirname "$0")
DC_APP_PORT_HTTPS="443"
DC_APP_PORT_HTTP="80"
RESPUESTA_USUARIO_PUERTO="s"

# Crear nombre del contenedor en base al nombre de la carpeta
DC_APP_NAME="web_"$(echo "${PWD}" | sed \-r 's|.*\/dev\/|''''|g' | sed \-r 's|\/?\.docker.*|''''|g')

# Devuelve 1 si el puerto está ocupado y 0 si está libre.
function consulta_puerto_ocupado () {
    wget --no-check-certificate --spider --server-response https://localhost:${1}/ 2>&1 | grep '200\ OK' | wc -l
}

function docker_compose_nombre_servicio () {
    sed -i s/"##NOMBRE_SERVICIO##"/${1}/g docker-compose.yml
}