## Instrucciones

Para la correcta ejecución de la aplicación se deben realizar las siguientes acciones:

- Ejecutar en la carpeta raíz del proyecto el comando: composer install
- Configurar en el archivo .env las credenciales para el acceso a la base de datos
- Ejecutar en la carpeta raíz del proyecto el comando: php artisan migrate:fresh --seed, que nos servira para crear roles, permisos y el usuario administrador para     entrar al sistema
- Ejecutar en la carpeta raíz del proyecto el comando: php artisan key:generate, que nos permite generar la llave de la aplicación


