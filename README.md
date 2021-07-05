# Technical Challenge 

MyApp es una aplicación que realiza la integración con un Sistema Externo, explícitamente un express checkout 
(“Checkout Pro”) de MercadoPago. Este tipo de checkout implica, una vista sencilla donde podemos ingresar los 
datos correspondientes a un usuario y un botón de pago que genera una petición de pago a la plataforma correspondiente.
Además de generar el pago, espera la integración de los webhooks de vuelta, ya que si el usuario paga en diferido 
quedaría en pendiente hasta realizar el pago o cancelarlo, por lo tanto en esos casos la plataforma de pago va a 
intentar comunicarse con nosotros para poder completar el estado de la transacción.

### Diagrama de flujo:

<p align="center"><a  target="_blank"><img src="https://user-images.githubusercontent.com/66972695/124402136-8bcce200-dd04-11eb-8cc4-9be0dfefb0df.png" width="700"></a></p>

## Instrucciones de Instalación
Este documento describe los pasos necesarios para configurar el entorno de desarrollo en la PC local bajo sistemas operativos Linux.

### Pre instalación del Proyecto.

* Tener instalado Git.
* Tener instalado Composer.

### Clonar Repositorio de GitHub.
```
https://github.com/carlaavila/Technical-Challenge.git
```
Una vez que ya tenemos clonado nuestro repositorio realizaremos los siguientes pasos.

### Instalación de las dependencias.
1. Ejecutamos `./composer.phar install`
2. Ejecutamos `npm install` Y finalmente vamos a compilar los archivos .scss y .js mediante el siguiente comando:
    `npm run dev` .
3. Esperar la instalación de dependencias de Laravel y compañía.

### Crear archivo de Enviroment
1. Crear un archivo ```.env```
2. Copiar lo que existe en el ```.env.example```
3. Podemos hacerlo automáticamente con el comando ```cp .env.example .env```
4. Este archivo contiene las credenciales de las cuentas de los servicios utilizados.

### Ejecución de las migraciones (Laravel)
1. Primeramente actualizar el archivo `.env` con los datos correspondientes de la BD:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=challenge
DB_USERNAME=root
DB_PASSWORD=C0274
```

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=7dd1d4933bb91b
MAIL_PASSWORD=fa5cb880ea2593
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=carlita-avila96@hotmail.com
MAIL_FROM_NAME="MIAPP"
```

2. Ejecutamos  `php artisan migrate`

3. Una vez terminada la ejecución ya tendremos las tablas correspondientes en nuestra base de datos.

4. Ejecutar para tener el `.env` completo y correcto `php artisan key:generate`.

5. Listo ya podemos entrar al sitio `localhost:8000`





