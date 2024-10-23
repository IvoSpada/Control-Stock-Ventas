<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class AdminController {

    public static function admin(Router $router){
        // Verificar sesión antes de ejecutar la lógica de esta acción
        LoginController::verificarAutenticacion();

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/index');
    }
    public static function perfil(Router $router) {
        // Verificar sesión antes de ejecutar la lógica de esta acción
        LoginController::verificarAutenticacion();

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/perfil');
    }
    public static function proveedor(Router $router){
        // Verificar sesión antes de ejecutar la lógica de esta acción
        LoginController::verificarAutenticacion();

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/proveedor');
    }
    public static function productos(Router $router){
        // Verificar sesión antes de ejecutar la lógica de esta acción
        LoginController::verificarAutenticacion();

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/producto');
    }
}