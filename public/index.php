<?php 

require_once __DIR__ . '/../includes/app.php';

//lamar al router y los Controladores
use MVC\Router;
use Controllers\LoginController;
use Controllers\AdminController;
use Controllers\ClientController;
use Controllers\APIController;
$router = new Router();

/*
----------------------------------
LOGIN CONTROLLER
----------------------------------
*/

//Seleccion de usuarios
$router->get('/', [LoginController::class, 'SelectUser']);
$router->post('/', [LoginController::class, 'SelectUser']);

//Login de Admin
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

//confirmar Mail de admin
$router->get('/confirmar', [LoginController::class, 'confirmar']);

//Enviar Mail para restablecer la contraseña
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);

//restablecer contraseña
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

//logout
$router->get('/logout', [LoginController::class, 'logout']);

/*
----------------------------------
ADMIN CONTROLLER
----------------------------------
*/

//Dashbord admin 
$router->get('/admin/dashboard', [AdminController::class, 'admin']);
$router->post('/admin/dashboard', [AdminController::class, 'admin']);

//Perfil de Admin
$router->get('/admin/perfil', [AdminController::class, 'perfil']);
$router->post('/admin/perfil', [AdminController::class, 'perfil']);

//Productos Admin
$router->get('/admin/productos', [AdminController::class, 'productos']);
$router->post('/admin/productos', [AdminController::class, 'productos']);

//Proveedor Admin
$router->get('/admin/proveedor', [AdminController::class, 'proveedor']);
$router->post('/admin/proveedor', [AdminController::class, 'proveedor']);

//Stock Admin
$router->get('/admin/stock', [AdminController::class, 'stock']);
$router->post('/admin/stock', [AdminController::class, 'stock']);

//Categorias Admin
$router->get('/admin/categorias', [AdminController::class, 'categorias']);
$router->post('/admin/categorias', [AdminController::class, 'categorias']);

//empleados Admin
$router->get('/admin/empleados', [AdminController::class, 'empleados']);
$router->post('/admin/empleados', [AdminController::class, 'empleados']);

//empleados Admin
$router->get('/admin/historialCajas', [AdminController::class, 'historialCajas']);
$router->post('/admin/historialCajas', [AdminController::class, 'historialCajas']);

/*
----------------------------------
Client CONTROLLER
----------------------------------
*/

//dashboard Client
$router->get('/dashboard', [ClientController::class, 'dashboard']);
$router->post('/dashboard', [ClientController::class, 'dashboard']);

//dashboard Client
$router->get('/caja', [ClientController::class, 'caja']);
$router->post('/caja', [ClientController::class, 'caja']);

//dashboard Client
$router->get('/cuentasCorrientes', [ClientController::class, 'cuentasCorrientes']);
$router->post('/cuentasCorrientes', [ClientController::class, 'cuentasCorrientes']);

//dashboard Client
$router->get('/historialVentas', [ClientController::class, 'historialVentas']);
$router->post('/historialVentas', [ClientController::class, 'historialVentas']);

/*
----------------------------------
API CONTROLLER 
----------------------------------
*/

//dashboard Client
$router->get('/api/categorias', [ApiController::class, 'categorias']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();