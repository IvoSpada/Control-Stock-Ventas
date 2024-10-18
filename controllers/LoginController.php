<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;


class LoginController {

    public static function login(Router $router) {

        //renderizar unaa vista. una ruta y paramentros
        $router->render('auth/login');
    }
    public static function logout() {
        echo 'desde logout';
    }
}