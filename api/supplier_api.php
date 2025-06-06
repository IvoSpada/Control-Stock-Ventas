<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Controllers\SupplierController;

$action = $_GET['action'] ?? '';

$controller = new SupplierController();

switch ($action) {
    case 'list':
        header('Content-Type: application/json');
        echo json_encode($controller->index());
        break;

    case 'add':
        $data = json_decode(file_get_contents("php://input"), true);
        header('Content-Type: application/json');
        echo json_encode($controller->store($data));
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        header('Content-Type: application/json');
        echo json_encode($controller->delete($id));
        break;

    default:
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Acción no válida']);
        break;
}
