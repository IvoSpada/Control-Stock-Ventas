Para Iniciar Tener:
-composer instalado.
-WAMP instalado.

Ejecutar composer install en la terminal.

Para inicializar el proyecto, una vez abierto en VScode, no hace falta hostearlo en wamp, como la manera tradicional; con ya tenerlo en la 
carpeta WWW es suficiente.

Abrimos la consola de VScode y ejecutamos: 'php -S localhost:{puerto} -t public', véase que el numero luego del localhost, puede cambiarse a cualquier puerto deseado, se usa el 3000 por ningún motivo en especial.

Si todo sale bien la consola debería regresarnos el siguiente mensaje:
        PHP 7.4.33 Development Server (http://localhost:3000) started