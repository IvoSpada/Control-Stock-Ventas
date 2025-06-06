<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {
        session_start();

        $currentUrl = $_SERVER['PATH_INFO'] ?? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $fn = null;

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } elseif ($method === 'POST') {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            // Si es una petición a /api/* devolvemos error en JSON
            if (str_starts_with($currentUrl, '/api/')) {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Ruta API no encontrada']);
            } else {
                echo "Página No Encontrada o Ruta no válida";
            }
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include_once __DIR__ . '/views/layout.php';
    }
}
