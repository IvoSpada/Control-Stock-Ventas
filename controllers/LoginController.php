<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;


class LoginController {

    // Inicia la sesión si aún no se ha iniciado
    private static function iniciarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function SelectUser(Router $router) {
        self::iniciarSesion();
        //renderizar unaa vista. una ruta y paramentros
        $router->render('auth/selectUser');
    }

    public static function login(Router $router) {
        self::iniciarSesion();
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

                            header('Location: admin/dashboard');

                    } else {
                        Usuario::setAlerta('error', 'Contraseña incorrecta');
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
        self::iniciarSesion();
        session_start();
        session_unset(); 
        session_destroy(); 
        setcookie(session_name(), '', time() - 3600); // Eliminar la cookie de sesión
        header("Location: /"); 
        exit();
    }

    // Método para verificar si el usuario está autenticado
    public static function verificarAutenticacion() {
        self::iniciarSesion();
        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            header('Location: /auth/login'); 
            exit();
        }
    }
} 