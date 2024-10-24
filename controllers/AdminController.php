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

        $alertas = [];

        //si es POST...
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //crear instancia usuario y  pasarle post
            $auth = new Usuario($_POST);
            $auth->sanitizarAtributos();
            
            if ($_POST['formulario'] === 'recuperar_mail') {


            } elseif ($_POST['formulario'] === 'cambiar_contraseña') {

                $alertas = $auth->validarLogin();

                if (empty($alertas)) {
                    //comprar el admin
                    $usuario = Usuario::where('admin', 1);
                    if ($usuario) {
                        //verificar si esta bien la contraseña
                        if($usuario->comprobarPassword($auth->contraseña)) {
                            $contraseñaNueva = $_POST['contraseñaNueva'];
                            $repetirContraseña = $_POST['repetirContraseña'];
                            // Verificar que las contraseñas coincidan
                            if(!empty($contraseñaNueva) && !empty($repetirContraseña)) {
                                if ($contraseñaNueva === $repetirContraseña) {
                                    $usuario->contraseña = password_hash($contraseñaNueva, PASSWORD_BCRYPT);
                                    $usuario->guardar(); // Guardar la nueva contraseña en la base de datos
                                    Usuario::setAlerta('exito', 'Contraseña actualizada correctamente');
                                } else {
                                    Usuario::setAlerta('error', 'Las contraseñas no coinciden');
                                }
                            } else {
                                Usuario::setAlerta('error', 'Todos los campos son obligatorios');
                            }
                        } else {
                            //si no esta bien setear la alerta
                            Usuario::setAlerta('error', 'Contraseña incorrecta');
                        }
                    }
                }
            }
            
        }
        $alertas = Usuario::getAlertas();
        //renderizar una vista. una ruta y paramentros
        $router->render('admin/perfil', [
            'alertas'=>$alertas
        ]);
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

    public static function stock(Router $router){
        // Verificar sesión antes de ejecutar la lógica de esta acción
        LoginController::verificarAutenticacion();

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/stock');
    }

    public static function categorias(Router $router){
        // Verificar sesión antes de ejecutar la lógica de esta acción
        LoginController::verificarAutenticacion();

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/categorias');
    }

    public static function empleados(Router $router){
        // Verificar sesión antes de ejecutar la lógica de esta acción
        LoginController::verificarAutenticacion();

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/empleados');
    }

    public static function historialCajas(Router $router){
        // Verificar sesión antes de ejecutar la lógica de esta acción
        LoginController::verificarAutenticacion();

        //renderizar una vista. una ruta y paramentros
        $router->render('admin/historialCajas');
    }
}