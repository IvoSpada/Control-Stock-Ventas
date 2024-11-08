<?php

namespace Controllers;

use Model\Productos;
use Model\Proveedor;
use Model\Usuario;
use MVC\Router;
use Model\Categoria;

class ApiController {
    public static function categorias() {
        $categorias = Categoria::all();
        echo json_encode($categorias);
    }
    public static function empleados() {
        $empleados = Usuario::all(); // Utiliza el modelo de Empleado para obtener todos los empleados
        echo json_encode($empleados);
    }
    public static function productos() {
        $productos = Productos::all(); // Utiliza el modelo de producto para obtener todos los productos
        echo json_encode($productos);
    }
    public static function proveedores() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $proveedor = Proveedor::find($id);
            if($proveedor){
                echo json_encode($proveedor);
            }
            else {
                echo json_encode(['error' => 'Proveedor NO encontrado']);
            }
        }
        else{
            $proveedores = Proveedor::all(); 
            echo json_encode($proveedores);
        }
    }
}