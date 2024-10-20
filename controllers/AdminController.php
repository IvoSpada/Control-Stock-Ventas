<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class AdminController {

    public static function admin(Router $router){
          //renderizar una vista. una ruta y paramentros
          $router->render('dashbord/dashbord');
    }
}