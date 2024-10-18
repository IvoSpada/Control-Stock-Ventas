<?php 

require_once __DIR__ . '/../includes/app.php';

//lamar al router y los Controladores
use MVC\Router;
use Controllers\LoginController;

$router = new Router();

//Iniciar Sesion 
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();