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
                //comprar el admin
                $usuario = Usuario::where('admin', 1);

                if($usuario) {
                    //si existe verifica la contraseña
                    if ($usuario->comprobarPassword($auth->contraseña)) {
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['admin'] = $usuario->admin;
                        $_SESSION['login'] = true;

                            header('Location: /dashboard');

                    } else {
                        Usuario::setAlerta('error', 'Contraseña incorrecto');
                    }
                } else {
                    echo 'no existe el admin';
                }

            }
        }
        $alertas = Usuario::getAlertas();
        //renderizar unaa vista. una ruta y paramentros
        $router->render('auth/login', [
            'alertas'=>$alertas
        ]);
    }


    public static function logout() {
        echo 'desde logout';
    }
}