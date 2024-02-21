const chalk = require("chalk");
const inquirer = require("inquirer");
const open = require("open");
const path = require("path");
const shelljs = require("shelljs");
const tcpPortUsed = require("tcp-port-used");
const threadSleep = require("thread-sleep");

const DEFAULT_HTTPS_PORT = 443;
const DEFAULT_HTTP_PORT = 80;
const PROJECT_PATH = path.resolve(__dirname, "..");
const APP_NAME = path.basename(PROJECT_PATH);
const DOCKER_COMPOSE_FILE_PATH = path.resolve(
  PROJECT_PATH,
  ".docker",
  "docker-compose.yml"
);

function createStructure() {
  const directories = [
    ".apache/run/apache2",
    ".apache/log/apache2",
    ".apache/lock/apache2",
  ];
  const files = [".apache/run/apache2.pid"];

  directories.forEach((dir) => {
    const dirPath = path.resolve(PROJECT_PATH, dir);
    shelljs.mkdir("-p", dirPath);
  });

  files.forEach((file) => {
    const filePath = path.resolve(PROJECT_PATH, file);
    shelljs.touch(filePath);
  });

  shelljs.exec("sudo chown -R adimedia.adimedia " + PROJECT_PATH);
}

async function getIsPortInUse(port) {
  return (
    (await tcpPortUsed.check(port, "127.0.0.1").then(
      function (inUse) {
        return inUse;
      },
      function (err) {
        console.error("Error al comprobar los puertos en uso:", err.message);
      }
    )) || false
  );
}

async function getAvailablePorts() {
  let httpsPort = DEFAULT_HTTPS_PORT;
  let httpPort = DEFAULT_HTTP_PORT;
  let isPortInUse = await getIsPortInUse(httpsPort);

  if (isPortInUse) {
    await inquirer
      .prompt([
        {
          type: "confirm",
          default: true,
          choices: [
            { name: "Yes", value: true },
            { name: "No", value: false },
          ],
          name: "useOtherPort",
          message: `El puerto ${httpsPort} ya se está usando. ¿Quieres intentar ejecutar la aplicación en otro puerto?`,
        },
      ])
      .then(async ({ useOtherPort }) => {
        if (!useOtherPort) {
          console.log(
            "La aplicación no se ha iniciado porque el puerto ya estaba en uso."
          );
          process.exit(0);
        } else {
          httpsPort = 9876;
          httpPort = 8876;
          isPortInUse = await getIsPortInUse(httpsPort);
          while (isPortInUse) {
            httpsPort++;
            httpPort++;
            isPortInUse = await getIsPortInUse(httpsPort);
          }
        }
      });
  }

  return { httpPort, httpsPort };
}

function startDockerService() {
  shelljs.exec("sudo service docker start");
  threadSleep(1000);
}

function getContainerId() {
  const command = `sudo docker ps -qf "name=${APP_NAME}"`;
  return shelljs.exec(command, { silent: true }).trim();
}

function startDockerContainer({ httpPort, httpsPort }) {
  const dockerComposeUpCommand = `sudo APP_NAME=${APP_NAME} APP_PORT_HTTPS=${httpsPort} APP_PORT_HTTP=${httpPort} docker-compose -p "${APP_NAME}" -f ${DOCKER_COMPOSE_FILE_PATH} up -d`;

  const dockerComposeResult = shelljs.exec(dockerComposeUpCommand, {
    silent: true,
  });
  if (dockerComposeResult.code !== 0) {
    console.error("Error al crear el contenedor:", dockerComposeResult.stderr);
    process.exit(1);
  } else {
    console.log(
      chalk.green(
        `La aplicación se está ejecutando en ${chalk.underline(
          `https://localhost:${httpsPort}`
        )} y ${chalk.underline(`http://localhost:${httpPort}`)}.`
      ),
      chalk.white("Pulsa Ctrl+C para parar.")
    );
    open(`https://localhost:${httpsPort}`);
  }
}

function stopDockerContainer({ httpPort, httpsPort }) {
  const stopContainerCommand = `sudo APP_NAME=${APP_NAME} APP_PORT_HTTPS=${httpsPort} APP_PORT_HTTP=${httpPort} docker-compose -p "${APP_NAME}" -f ${DOCKER_COMPOSE_FILE_PATH} down`;
  const stopContainerResult = shelljs.exec(stopContainerCommand, {
    silent: true,
  });
  if (stopContainerResult.code !== 0) {
    console.error("Error al parar el contenedor:", stopContainerResult.stderr);
    process.exit(1);
  }

  console.log(chalk.green("Se ha parado el contenedor correctamente"));
}

function handleProcessStop({ httpPort, httpsPort }) {
  console.log("\n");
  console.log(chalk.cyan("Terminando procesos y parando el contenedor..."));
  const containerId = getContainerId();

  if (containerId) {
    stopDockerContainer({ httpPort, httpsPort });
  } else {
    console.log(chalk.yellow("No hay ningún contenedor ejecutándose. Saliendo..."));
  }
  process.exit();
}

function handleDockerContainerExternallyStopped() {
  const containerId = getContainerId();
  if (!containerId) {
    console.log(
      chalk.red(
        "Parece que el contenedor se ha parado. Finalizando el proceso."
      )
    );
    process.exit(1);
  }
}

async function main() {
  // Sudo privileges
  shelljs.exec("echo 'adi1492' | sudo -S echo 'Authenticated as sudo'", {
    silent: true,
  });

  createStructure();
  const { httpPort, httpsPort } = await getAvailablePorts();

  startDockerService();
  startDockerContainer({ httpPort, httpsPort });

  // Listen for the Ctrl+C signal
  process.on("SIGINT", () => handleProcessStop({ httpPort, httpsPort }));

  setInterval(handleDockerContainerExternallyStopped, 10000);
}

main();
