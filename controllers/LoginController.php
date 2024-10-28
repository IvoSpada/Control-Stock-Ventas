<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Classes\Email;


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
        $mail = null;
        $usuario = Usuario::where('admin', 1);
        if($usuario) {
            $mail = $usuario->email;
        }

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
                        $_SESSION['id'] = $usuario->id;
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
            'nombreUsuario' => $nombreUsuario,  // Pasar el nombre del usuario a la vista
            'email'=>$mail //pasar el mail, puede ser null o no
        ]);
    }

    public static function olvide(Router $router) {
        $alertas = [];
        $enviando = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario) {
                    $enviando = true;
                    //crear token y guardar
                    $usuario->crearToken(); //model
                    $usuario->guardar();    //activeRecord
                    //Enviar Email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    //enviar Alerta
                    Usuario::setAlerta('exito','Instrucciones enviadas al Email');
                } else {
                    Usuario::setAlerta('error','El usuario no existe');

                }
            }
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/olvide', [
            'alertas'=>$alertas,
            'enviando'=>$enviando
        ]);
    }

    public static function recuperar(Router $router) {
        $alertas = [];
        $error = false;
        $token = isset($_GET['token']) ? s($_GET['token']) : null;

        //buscar usuario por su token
        $usuario = Usuario::where('token',$token);

        if ($usuario === null) {
            Usuario::setAlerta('error','Token no valido');
            $error = true;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //sanitizar la entrada de datos
            $datos_sanitizados = Usuario::sanitizarDatos($_POST);
            $repContraseña = $datos_sanitizados['repContraseña'] ?? null;

            //asignar contraseña a la instancia usuario recién creada
            $contraseña = new Usuario($_POST);
            
            //validar los campos
            $alertas = $contraseña->validarCambioContraseña($repContraseña);
            if (empty($alertas)) {
                //usuario password = null
                $usuario->contraseña = '';
                $usuario->token = NULL;
                $token = NULL;
                //reasignamos la contraseña por la que puso el usuario
                $usuario->contraseña = $contraseña->contraseña;
                //hashear
                $usuario->hashPassword();

                //guardar la catualizacion (activeRecord)
                $resultado = $usuario->guardar();

                //si se ejecuta bien entonces...
                if($resultado) {
                    //redireccionamos
                    header('Location: /');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar', [
            'alertas'=>$alertas,
            'error'=>$error,
            'token'=>$token
        ]);
    }

    public static function confirmar(Router $router) {
        $alertas = [];
        $token = s($_GET['token']);

        $usuario = Usuario::where('token',$token);

        if (empty($usuario)) {
            //mostrar mensaje de error 
            Usuario::setAlerta('error', 'Token no válido');
            $admin = Usuario::where('admin',1);
            if ($admin) {
                $admin->email = '';
                $admin->guardar();
            }
            
        } else {
            //sacar el token
            $usuario->token =null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Token válido, Confirmando mail...');
        }
        //obtener alertas
        $alertas = Usuario::getAlertas();

        //enviar alertas a vista
        $router->render('auth/confirmar-mail',[
            'alertas'=>$alertas
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