# DockerDAD
## Actividad de DAD / 05/05/2026

_Del repositorio https://github.com/joseluisgs/docker-tutorial/tree/master_

#  ejem01
Editar dentro del contenedor de Docker
- Instalar un editor de texto como Vim o Nano
- Para instalar en linux un programa se debe actualizar el listado de repositorios de APT
- Luego ejecutar por ej para instalar Vim, el comando apt-get install -y vim
- Es probable que se deba corregir el Dockerfile, pegar el error en, por ej. Chatgpt.
- Editar el archivo index.html con Vi desde la terminal del docker ejecutando vi index.html.
- poner su nombre, fecha y materia. Para editar presionar por primera vez la letra i. Para guardar presionar ESC, luego :, luego wq.
- Hacer captura de pantalla y pega en el Readme del github q creen para éste proyecto
  
<img width="737" height="310" alt="image" src="https://github.com/user-attachments/assets/c144b91f-23db-4a29-b66b-910dcf230332" />

Editar desde VS Code en el contenedor de Docker
- Instalar en VS Code la extensión Remote Explorer
- Conectar a Docker y buscar el contenedor
- Como no se puede conectar por error en GLIBC por la versión de php7.0, actualizar a php 8.2
- Relanzar la imagen de docker

# ejem02
- run.sh es un archivo para ejecutar en una terminal de linux sh o bash
- Interpretar los comandos en run.sh
- Ejecutar manualmente en la terminal de VS Code
- Subir captura de pantalla del despliegue de docker


<img width="705" height="625" alt="image" src="https://github.com/user-attachments/assets/ad61c7d8-6851-49dc-8d96-30f267b26a3b" />


--------------------------------------------------------------------------------------------------------------------------------



<img width="1001" height="667" alt="image" src="https://github.com/user-attachments/assets/4de43167-d904-4a7f-9256-c6f2a8093974" />



-----------------------------------------------------------------------------------------------------------------------------------



<img width="471" height="439" alt="image" src="https://github.com/user-attachments/assets/3dfe1a8e-f941-4fb6-a428-c6feeaba6c98" />


----------------------------------------------------------------------------------------------------------------------------------

# ejem03 
-Correr el script 
<img width="1331" height="689" alt="Captura de pantalla 2026-05-12 173054" src="https://github.com/user-attachments/assets/012fb9b1-d115-4316-94f6-e6b3ca9f2e82" />

----------------------------------------------------------------------------------------------------------------------------------

# Ejem04
-Ejecutamos la aplicacion con el comando : 
`docker-compose up -d`

----------------------------------------------------------------------------------------------------------------------------------
docker-compose VA a automatizar todo este proceso largo que venía haciendo.

<img width="943" height="614" alt="image" src="https://github.com/user-attachments/assets/0867a08a-3204-4300-9c64-4fb886becc22" />

* Evaluar los inconvenientes de correr scripsts de S.O
 ### 1. Falta de Idempotencia
* Este es probablemente el mayor problema. La "idempotencia" significa que podés ejecutar una instrucción múltiples veces y el resultado siempre será el mismo, sin causar errores.

* El problema del script: Si un script tiene 10 pasos, crea una carpeta en el paso 1 y falla en el paso 5, al volver a ejecutarlo probablemente tire un error en el paso 1 porque "la carpeta ya existe".

* Los scripts ejecutan instrucciones a ciegas, no revisan el estado actual del sistema antes de actuar (a menos que escribas código extra muy complejo para validar cada paso).

### 2. Poca Portabilidad (Cross-Platform)
* Los scripts están fuertemente atados al sistema operativo para el que fueron escritos.

* Un script de PowerShell (.ps1) o Batch (.bat) que usa rutas como C:\proyecto no va a funcionar en un servidor Linux.

* Un script de Bash (.sh) que usa comandos nativos de Linux y rutas como /var/www/ no correrá nativamente en Windows sin instalar herramientas de terceros (como WSL o Git Bash).

* Esto rompe la regla de oro del desarrollo moderno: "Debe funcionar igual en la máquina del desarrollador que en el servidor de producción".

### 3. Seguridad y Permisos
* Los sistemas operativos modernos desconfían de los scripts por defecto para evitar malware.

* En Windows, las políticas de ejecución (Execution Policies) suelen bloquear los scripts .ps1 a menos que el usuario los habilite manualmente, lo que frena la automatización.

* Muchos scripts requieren ser ejecutados con privilegios máximos (Administrador o Root) para instalar cosas o cambiar configuraciones, lo cual es un riesgo crítico de seguridad si el script tiene alguna vulnerabilidad o si proviene de una fuente no confiable.

### 4. Dependencia del Entorno (Falta de Aislamiento)
* Un script asume que la computadora donde se está ejecutando ya tiene instaladas ciertas herramientas.

* Si tu script hace un curl para descargar un archivo o usa tar para descomprimirlo, y la máquina destino no tiene instalados esos programas, el script va a fallar inmediatamente.

* No encapsulan sus propias dependencias.

### 5. Mantenibilidad y Depuración (Debugging)
* A medida que los scripts crecen, se vuelven muy difíciles de leer y mantener ("código espagueti").

* No tienen herramientas de depuración (debuggers) tan avanzadas como los lenguajes de programación tradicionales.

* El manejo de errores es rústico: muchas veces un comando falla silenciosamente, el script continúa ejecutando los pasos siguientes y termina causando un desastre en el sistema.

***Conclusión:***
Por todos estos motivos, la industria se alejó de los "scripts de configuración" y migró hacia herramientas declarativas. En lugar de escribir un script que diga paso a paso cómo hacer las cosas (imperativo), hoy se usan archivos como docker-compose.yml que simplemente declaran cuál debe ser el estado final (declarativo), dejando que el motor se encargue de resolver cómo lograrlo de forma segura, portátil e idempotente.
