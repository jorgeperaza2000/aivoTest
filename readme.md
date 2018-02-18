# Test para Aivo 

## Instalar el proyecto

Clone el proyecto.

    git clone https://github.com/jorgeperaza2000/aivoTest.git [my-app-name]

Reemplace `[my-app-name]` con el nombre de directorio que desee.

Luego de clonar el proyecto ejecutar el siguiente comando para instalar todas las dependencias.

	composer install

Renombrar el archivo .env.example a .env y generar el APP_KEY del proyecto con los siguientes comandos.
	
	cd /path/to/project/[my-app-name]
	php artisan key:generate

Agregar las constantes de Facebook en .env

	FB_API_ID="ACA EL API_ID DE FACEBOOK"
	FB_APP_SECRET="ACA EL APP_SECRET DE FACEBOOK"

## Ejecutar el proyecto
Para ejecutar el proyecto en el puerto de su preferencia, dirijase a su navegador de preferencia o su cliente REST API y ejecute la siguiente url:

	php artisan serve --port=8080
	http://localhost:8080/profile/facebook/123456