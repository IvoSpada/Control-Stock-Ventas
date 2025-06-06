<?php
class Database {
    public static function connect() {
        $host = 'localhost';
        $db = 'tu_base_de_datos';
        $user = 'tu_usuario';
        $pass = 'tu_contraseña';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            $pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return $pdo;
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }
}
