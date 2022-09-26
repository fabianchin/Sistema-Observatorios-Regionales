<p align="center"><a href="https://ibb.co/XY6xp1Z"><img src="https://i.ibb.co/CP4Kvg5/Logos-Observatorios.png" alt="Logos-Observatorios" border="0"></a></p>

# Sistema-Observatorios-Regionales

Código del sistema de los observatorios regionales en framework Laravel.

---------------------------------------------------------------------------------------------------------------
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Descarga de elementos a utilizar

## COMANDOS
Para todos los pasos, siempre verificar que se haya instalado todo correctamente con los siguientes comandos:

## Comandos y pasos para poder correr un proyecyo de Laravel

## MIGRACIONES
Antes de empezar, hay que saber sobre migraciones en Laravel

Las Migraciones se les conoce como el control de versiones de tu base de datos; de esta forma se puede crear la base de datos y compartir el diseño con el equipo de trabajo. Si deseas agregar nuevas tablas o columnas a una tabla existente, puedes hacerlo con una nueva migración; si el resultado no fue el deseado, puedes revertir esa migración.


### CREACIÓN DEL PROYECTO
1. Crear una carpeta en donde estará el proyecto nuevo, en nuestro caso será tener un lugar o carpeta en donde se clonará este repositorio, ya que aqui va el proyecto.

2. Verificar las versiones de PHP, Composer, Node y NPM en POWERSHELL o CMD
- COMPOSER: composer -v
VERSION DEL PROYECTO: Composer version 2.4.1

- PHP: php -v 
VERSION DEL PROYECTO: PHP 8.1.10 (cli), Zend Engine v4.1.10

- NODE: node -v
VERSION DEL PROYECTO: v16.15.1

- NPM: npm -v
VERSION DEL PROYECTO: 8.11.0

3. Instalar TailwindCSS en POWERSHELL o CMD
- Posicionarse en la carpeta del proyecto de laravel
- npm install -D tailwindcss postcss autoprefixer
- npx tailwindcss init -p
      -> (crea el archivo de configuracion)
      
### CORRER EL PROYECTO
1. Arrancar un proyecto de laravel en POWERSHELL o CMD:
- php artisan serve

2. Instalar Node en el proyecto (SOLO LA PRIMERA VEZ)
- npm install

3. Instalar TailwindCSS al proyecto y creacipon de archivo de configuracion (SOLO LA PRIMERA VEZ)
- Posicionarse en la carpeta del proyecto de laravel
- npm install -D tailwindcss postcss autoprefixer
- npx tailwindcss init -p

4. Despues de haber instalado TailwindCSS, se debe de tener otro POWERSHELL o CMD corriendo con este comando:
- npm run dev

5. Creacion de tablas o bases de datos por medio de migraciones de Laravel y MySQL Workbench
5.1. Migraciones
- php artisan migrate
- artisan migrate:rollback (Revierte la conección con la tabla)
- sail artisan migrate:rollback --step=5 (ejemplo de un rollback por pasos)

5.2. Make, comando para creación
- artisan make:migration <nombre> (les da un nombre a las migraciones, este nombre sale en el proyecto de laravel en la parte de migraciones)

## DESCARGA E INSTALACION

### Para VisualStudioCode:
https://code.visualstudio.com/download

![image](https://user-images.githubusercontent.com/85766666/189496026-9c2bf193-5709-4ae9-b11c-60e33dc46100.png)

Se escoje la arquitectura de la computadora y se instala.

----------------------------------------------------------------------------------------------------------------------------------

### Github Desktop: 
https://desktop.github.com/

![image](https://user-images.githubusercontent.com/85766666/192297683-bae300e3-3fce-46e7-b447-47fbc55148f2.png)

### Pasos de uso:
1. Descargar la aplicación a la computadora.
2. Localizar una carpeta en donde se guardaran el o los repositorios en nuestra computadora.
3. Iniciar sesión de github en la aplicación.
4. Seleccionar un repositorio para clonar en la carpeta del paso 2.

Cuando ya hay un repositorio clonado en nuestra computadora:
1. Presionar fetch origin para verificar cambios en el repositorio de git.
![image](https://user-images.githubusercontent.com/85766666/192298363-1cbbe0f7-47ef-4da3-a7f3-2ab4c04b15e1.png)
2. En caso de haber, presionar el mismo boton, el mismo dirá "Pull request" con un numero de la cantidad de cambios.

En caso de hacer un cambio:
1. Verificar los cambios del git.
2. Verificar los cambios por hacer en la aplicación (parte izquierda, sale todos los archivos y lineas modificadas por usted).
3. Darle nombre y descripción al commit, abajo a la izquierda.
4. Presionar Commit to main.
5. Volver a presionar el mismo boton.

----------------------------------------------------------------------------------------------------------------------------------

### Para MySQL:
https://dev.mysql.com/downloads/mysql/

![image](https://user-images.githubusercontent.com/85766666/189496047-1bae6868-286b-4d9c-b761-9d311f7fb875.png)



----------------------------------------------------------------------------------------------------------------------------------

### Para PHP:
NOTA: Si usan XAMPP, ya el por defecto trae una ruta de PHP, en mi caso yo la elimne por completo de las variables de entorno pues la version que iba a usar fue esta que vamos a instalar, en mi caso tiraba un error con ambos PHP en el PATH, asi que si les funciona el proyecto de Laravel con el php de xampp, CREO que podrian hacer caso omiso, solo recordar que esta version de PHP es la siguiente: 
VERSION DEL PROYECTO: PHP 8.1.10 (cli), Zend Engine v4.1.10

https://windows.php.net/download#php-8.1

![image](https://user-images.githubusercontent.com/85766666/189496090-2449f971-bbbd-4f0e-b7fd-62e6deea94a2.png)

Selecciona el cuadro que dice THREAD SAFE, luego la arquitectura de su computadora.
Al darle descargar, es un .zip

Lo que se hace es darle click derecho y darle en "Extraer todo" y la carpeta extraída la vamos a poner en la unidad C:

![image](https://user-images.githubusercontent.com/85766666/189687079-4a5125c8-7822-432c-9770-340d7a06c84f.png)

Ahora, hay que agregarlo a las variables de entorno del sistema
En busqueda de windows buscamos "Editar as variables del sistema", en ingles "Edit the system ebviroment variables"

![image](https://user-images.githubusercontent.com/85766666/189688292-c376dcb8-56c2-415e-bb3d-6354573d9519.png)

Luego en el boton:

![image](https://user-images.githubusercontent.com/85766666/189688384-fdc38e23-e54f-4873-9be8-ad9dc4869401.png)

Vamos a las variables del sistema y seleccionamos el que dice PATH

![image](https://user-images.githubusercontent.com/85766666/189688948-d2d61257-2c08-4413-a3b4-3a25d98cecc0.png)

Le damos en el boton de edit

![image](https://user-images.githubusercontent.com/85766666/189689316-dfe6fe04-12bf-48d8-bead-48d7d97adb22.png)

Luego, en el boton de New

![image](https://user-images.githubusercontent.com/85766666/189689404-bce9c3b7-91b4-4c2f-a091-5d282cc6ebe7.png)

Y colocamos donde se tiene guardado PHP, en este caso lo guardamos en C:, y lo ponemos abajo

![image](https://user-images.githubusercontent.com/85766666/189689726-058c6b12-904a-4472-bfb5-4cc81cdf7220.png)

Le damos en OK y luego en Aplicar.

----------------------------------------------------------------------------------------------------------------------------------

### Para Composer:
https://getcomposer.org/download/

![image](https://user-images.githubusercontent.com/85766666/189496100-603d1561-628f-4552-be4d-2e71052e21b4.png)

Al descargar el archivo .exe le damos permiso a todos los usuarios, luego aparece una pantalla con una cajita de Developer Mode, NO la marcamos y le damos siguiente

![image](https://user-images.githubusercontent.com/85766666/189701962-f8228e37-88ce-4e2f-89c0-dfc243611c11.png)

En la ruta, debemos de ir a la ruta donde tenemos PHP, de nuevo, si tienen XAMPP, puede ser que ya traigan composer, sino se pone en la ruta del PHP de XAMPP, pero si no lo tienen y lo van instalando a como yo en C:, se ponen sobre la ruta C:\php\php.exe

![image](https://user-images.githubusercontent.com/85766666/189703263-c39fe592-07f8-4aa4-8fa3-b70c1d81bb6e.png)

El proxy no se toca y terminan de instalar.

----------------------------------------------------------------------------------------------------------------------------------

### Para Node y NPM:

Presionamos el que diga RECOMENDADO PARA LA MAYORIA DE LOS USUARIOS
https://nodejs.org/en/download/

![image](https://user-images.githubusercontent.com/85766666/189496140-e063cf39-bc93-4ce0-a784-a3e93f020705.png)

Es un archivo.msi
Solo se aceptan los terminos y se de la Next hasta este punto, en donde si le clickeamos el check a esta opcion

![image](https://user-images.githubusercontent.com/85766666/189705552-94f9cb25-bef2-49d2-9b3b-6034d48df928.png)

Despues next e instalar.

Ahora, un CMD se va a abrir automaticamente, en donde solo le damos cualquier tecla para continuar con la instalacion de paquetes

![image](https://user-images.githubusercontent.com/85766666/189705845-ad0dce2e-01a9-43cb-8e66-aaf8cc5fc60b.png)

Despues, abrira powershell u otro cmd donde instalaran paquetes y dependencias de Chocolatery y  Phyton, esto se hace automaticamente, sabremos que todo termino correctamente cuando nos salga un mensaje de que presionemos ENTER para salir

![image](https://user-images.githubusercontent.com/85766666/189706405-a0f899e5-1f15-4262-af97-4d388779d6c9.png)

Luego, nos fijamos en las versiones con los comandos de arriba del documento, especificamente node y npm.
----------------------------------------------------------------------------------------------------------------------------------

### Para TailwindCSS y Vite:

Se abre el Powershell o CMD, se posiciona sobre el proyecto con cd "ruta del proyecto", y luego ejecuta el siguiente comando:
npm install -D tailwindcss postcss autoprefixer

![image](https://user-images.githubusercontent.com/85766666/189707341-68bc4706-d6e6-4c5b-8756-1b7ce62a0e8f.png)

###IMPORTANTE:
El proyecto ya trae Vite y Tailwindcss por defecto, ESTOS PASOS DE AQUI EN ADELANTE NO HAY QUE HACERLOS EN ESTE PROYECTO ya que ya viene por defecto, pero si algun dia hacen otro proyecto de laravel con tailwindcss, si abria que hacerlo.

Luego, el siguiente comando nos creara el archivo de configuracion de tailwind
npx tailwindcss init -p
Esto crea un archivo llamado tailwind.config.js, en donde le pondremos las siguientes lineas:

![image](https://user-images.githubusercontent.com/85766666/189708108-be3b2c32-8b17-44cd-ba01-fdf8627dae4a.png)

Luego, nos metemos a la carpeta de resources -> css -> app.css, ahi pondremos las sigueintes lineas de codigo:

![image](https://user-images.githubusercontent.com/85766666/189708347-8752be2d-6990-48e1-9bb3-6ff37e1bc466.png)

## Una vez que se tiene instalado tailwindcss
Una vez listo, o cada vez que queramos ejecutar el proyecto, abrimos un powershell o cmd que correra siempre en el background, este powershell es aparte del php artisan serve, con el comando:
- npm run dev

Para añadirlo a las vistas, se incluye la linea de Vite:

![image](https://user-images.githubusercontent.com/85766666/189708934-ed107661-3f07-4a15-a89e-5d7d1cbce749.png)

Listo.


----------------------------------------------------------------------------------------------------------------------------------
# ESTRUCTURA DEL PROYECTO

### Objetos
![image](https://user-images.githubusercontent.com/85766666/189758743-a2e03a7d-a6d6-435d-83a5-fe54f0cbab3c.png)
      
### Vistas
Lo principal que debe de saber es.. ¿en dónde van las vistas de la página web? Se pueden reconocer facil porque usan ".blade"

![image](https://user-images.githubusercontent.com/85766666/189761780-2cef9603-2a6c-495b-b003-c2658ee334b5.png)
      
En Laravel, la manera que una vista se conecta con otra, ya sea por medio de botones o formularios, etc, es por medio de enrutamiento, un file llamado web.php
      
![image](https://user-images.githubusercontent.com/85766666/189762017-b7f1be46-20e3-422e-8323-501b82c189fe.png)
      
### Controladoras de las vistas
![image](https://user-images.githubusercontent.com/85766666/189755525-176a9f59-4cec-482c-8eaa-32f5be099bfb.png)

### Migraciones
![image](https://user-images.githubusercontent.com/85766666/189759037-cfe72f64-3cfe-44a3-97d3-b612029d3557.png)

### Public -> lo que el usuario ve (Imagenes, archivos JS o hasta hojas de estilo, por ejemplo)
![image](https://user-images.githubusercontent.com/85766666/189759277-957d3b80-1365-4308-aa70-e878506c77a6.png)

### Archivos que el usuario sube
![image](https://user-images.githubusercontent.com/85766666/189762286-c49d77df-8fb8-459f-a896-8ec9db23c472.png)

### Pruebas, de features o unitarias
![image](https://user-images.githubusercontent.com/85766666/189762386-2ec35fa6-c641-4f9d-ab69-7cdb81ac9d26.png)

### Creacion de pruebas unitarias
![image](https://user-images.githubusercontent.com/85766666/189762998-3dc74f48-9f1b-499c-98d2-9613dea21e51.png)
      
### Librerias y dependencias del proyecto (no se toca, normalmente se llenan por medio de comandos)
![image](https://user-images.githubusercontent.com/85766666/189762479-c290ff0d-6930-4484-8307-e52f7ada3ab0.png)

### Variables de entorno / Conexion a base de datos y servicios AWS o AZURE
![image](https://user-images.githubusercontent.com/85766666/189762666-906fbe8e-8a0f-4306-8898-28f220950a0b.png)

### Paquete de configuraciones
Aqui lo que se hace es configurar o hacer palabras para la compilacion mas facil por medio de cmd o pwershell

![image](https://user-images.githubusercontent.com/85766666/189763038-a5087ffc-20a4-4e90-a13e-acd0c86276a5.png)

### Configuracion de Vite / Tailwindcss
vite.conf.js
      
      
