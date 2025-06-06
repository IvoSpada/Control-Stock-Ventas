<?php

namespace Controllers;

use Model\Proveedor;
use MVC\Router;

class SupplierController
{
    // Vista principal del módulo proveedor
    public static function index(Router $router)
    {
        $router->render('admin/proveedor/index', []);
    }

    // Obtener todos los proveedores
    public static function listar()
    {
        header('Content-Type: application/json');
        $proveedores = Proveedor::all();
        echo json_encode($proveedores);
    }

    // Crear un nuevo proveedor
    public static function crear()
    {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);

        if ($data) {
            $proveedor = new Proveedor($data);
            $resultado = $proveedor->guardar();

            echo json_encode([
                'success' => $resultado,
                'message' => $resultado ? 'Proveedor guardado' : 'Error al guardar proveedor'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
        }
    }

    // Eliminar un proveedor por ID
    public static function eliminar()
    {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        if ($id) {
            $proveedor = Proveedor::find($id);
            if ($proveedor) {
                $resultado = $proveedor->eliminar();
            } else {
                $resultado = false;
            }

            echo json_encode([
                'success' => $resultado,
                'message' => $resultado ? 'Proveedor eliminado' : 'Error al eliminar proveedor'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'ID no especificado']);
        }
    }

    public static function actualizar()
    {
        require_once __DIR__ . '/../includes/database.php';

        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['id'])) {
            echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
            return;
        }

        // Sanitizar datos
        $id = mysqli_real_escape_string($db, $data['id']);
        $nombre = mysqli_real_escape_string($db, $data['nombre']);
        $telefono = mysqli_real_escape_string($db, $data['telefono']);
        $email = mysqli_real_escape_string($db, $data['email']);
        $descripcion = mysqli_real_escape_string($db, $data['descripcion']);
        $direccion = mysqli_real_escape_string($db, $data['direccion']);

        $query = "UPDATE proveedores SET 
                nombre = '$nombre',
                telefono = '$telefono',
                email = '$email',
                descripcion = '$descripcion',
                direccion = '$direccion'
                WHERE id = $id";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error en la consulta: ' . mysqli_error($db)
            ]);
        }
    }
}