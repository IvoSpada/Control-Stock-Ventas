<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class AdminController {

    public static function admin(Router $router){
        
        if (session_id() === '') {
            session_start();
        }

        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            // Redirigir al usuario a la página de inicio de sesión
            header('Location: /');
            exit();
        }

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/dashboard');
    }
}