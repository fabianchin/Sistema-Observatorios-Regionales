# Descarga de elementos a utilizar

## COMANDOS
Para todos los pasos, siempre verificar que se haya instalado todo correctamente con los siguientes comandos:

## Comandos y pasos para poder correr un proyecyo de Laravel

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

2. Instalar Node en el proyecto
- npm install

FALTA'''''''''''''''''''''''''

4. Despues de haber instalado TailwindCSS, se debe de tener otro POWERSHELL o CMD corriendo con este comando:
- npm run dev

## DESCARGA E INSTALACION

### Para VisualStudioCode:
https://code.visualstudio.com/download
![image](https://user-images.githubusercontent.com/85766666/189496026-9c2bf193-5709-4ae9-b11c-60e33dc46100.png)

Se escoje la arquitectura de la computadora y se instala.

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
IMPORTANTE: El proyecto ya trae Vite y Tailwindcss por defecto, ESTO NO HAY QUE HACERLO EN ESTE PROYECTO ya que ya viene por defecto, pero si algun dia hacen otro proyecto de laravel con tailwindcss, si abria que hacerlo.

Se abre el Powershell o CMD, se posiciona sobre el proyecto con cd "ruta del proyecto", y luego ejecuta el siguiente comando:
npm install -D tailwindcss postcss autoprefixer
![image](https://user-images.githubusercontent.com/85766666/189707341-68bc4706-d6e6-4c5b-8756-1b7ce62a0e8f.png)

Luego, el siguiente comando nos creara el archivo de configuracion de tailwind
npx tailwindcss init -p
Esto crea un archivo llamado tailwind.config.js, en donde le pondremos las siguientes lineas:
![image](https://user-images.githubusercontent.com/85766666/189708108-be3b2c32-8b17-44cd-ba01-fdf8627dae4a.png)

Luego, nos metemos a la carpeta de resources -> css -> app.css, ahi pondremos las sigueintes lineas de codigo:
![image](https://user-images.githubusercontent.com/85766666/189708347-8752be2d-6990-48e1-9bb3-6ff37e1bc466.png)

Una vez listo, abrimos un powershell o cmd que correra siempre en el background, este powershell es aparte del php artisan serve, con el comando:
npm run dev

Para añadirlo a las vistas, se incluye la linea de Vite:
![image](https://user-images.githubusercontent.com/85766666/189708934-ed107661-3f07-4a15-a89e-5d7d1cbce749.png)

Listo.



