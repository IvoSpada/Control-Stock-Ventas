<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;


class LoginController {
    public static function SelectUser(Router $router) {

        $usuarios = new Usuario();
        $resultados = $usuarios::all('usuarios');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Capturar el nombre del usuario seleccionado
            $nombreUsuario = $_POST['user_role'];  

            // Redirigir al login con el nombre del usuario
            header('Location: /login?user=' . urlencode($nombreUsuario));
            exit();
        }
        
        // Si no es POST, simplemente renderizamos la vista
        $router->render('auth/selectUser', [
            'usuarios' => $resultados
        ]);
    }

    public static function login(Router $router) {
        $alertas = [];
        $auth = new Usuario($_POST);

        // Obtener el nombre de usuario de la URL
        $nombreUsuario = isset($_GET['user']) ? $_GET['user'] : '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->nombre = $nombreUsuario; 
            $alertas = $auth->validarLogin();
            if (empty($alertas)) {

                $usuario = Usuario::where('nombre', $auth->nombre);

                if($usuario) {
                    // Verificar la contraseña
                    if ($usuario->comprobarPassword($auth->contraseña)) {
                        
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        $_SESSION['dni'] = $usuario->dni;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['login'] = true;

                        // Redirigir según el rol
                        if($usuario->admin === "1") {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin/dashboard');
                        } else {
                            header('Location: /empleado');
                        }
                        exit();
                    } else {
                        Usuario::setAlerta('error', 'Contraseña incorrecta');
                    }
                } else {
                    Usuario::setAlerta('error', 'El usuario no existe');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/login', [
            'alertas' => $alertas,
            'nombreUsuario' => $nombreUsuario  // Pasar el nombre del usuario a la vista
        ]);
    }


    public static function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        header('Location: /');
    }

} 