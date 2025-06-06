<?php
require_once '../../controllers/SupplierController.php';

use Controllers\SupplierController;

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Ejemplo simple:
if ($method === 'GET' && strpos($uri, 'listar') !== false) {
    SupplierController::listar();
} elseif ($method === 'POST' && strpos($uri, 'crear') !== false) {
    SupplierController::crear();
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Ruta no encontrada']);
}
