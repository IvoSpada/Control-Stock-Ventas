<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;


class LoginController {

    public static function SelectUser(Router $router) {

        //renderizar unaa vista. una ruta y paramentros
        $router->render('auth/selectUser');
    }

    public static function login(Router $router) {
        $alertas = [];
        $auth = new Usuario($_POST);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                
            }
        }

        //renderizar unaa vista. una ruta y paramentros
        $router->render('auth/login', [
            'alertas'=>$alertas
        ]);
    }


    public static function logout() {
        echo 'desde logout';
    }
}