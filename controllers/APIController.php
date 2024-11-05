<?php

namespace Controllers;

use MVC\Router;
use Model\Categoria;

class ApiController {
    public static function categorias() {
        $categorias = Categoria::all();
        echo json_encode($categorias);
    }
}