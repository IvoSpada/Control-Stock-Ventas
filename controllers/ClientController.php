<?php
namespace Controllers;

use MVC\Router;

class ClientController {

    public static function dashboard(Router $router) {

        //renderizar una vista. una ruta y paramentros
        $router->render('client/index');
    }

    public static function caja(Router $router) {

        //renderizar una vista. una ruta y paramentros
        $router->render('client/caja');
    }

    public static function cuentasCorrientes(Router $router) {

        //renderizar una vista. una ruta y paramentros
        $router->render('client/cuentasCorrientes');
    }

    public static function historialVentas(Router $router) {

        //renderizar una vista. una ruta y paramentros
        $router->render('client/historialVentas');
    }
}