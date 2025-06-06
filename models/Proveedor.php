<?php
namespace Model;

use PDO;
use PDOException;

class Proveedor extends ActiveRecord {
    protected static $tabla = 'proveedores';
    protected static $columnasDB = ['id', 'nombre', 'telefono', 'email', 'descripcion', 'direccion'];

    public $id;
    public $nombre;
    public $telefono;
    public $email;
    public $descripcion;
    public $direccion;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
    }

    // ---- Métodos PDO opcionales (además del ActiveRecord) ----

    public static function obtenerTodosPDO($db) {
        try {
            $stmt = $db->query("SELECT * FROM proveedores");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function crearPDO($db, $data) {
        try {
            $stmt = $db->prepare("INSERT INTO proveedores (nombre, telefono, email, descripcion, direccion)
                                  VALUES (:nombre, :telefono, :email, :descripcion, :direccion)");
            $stmt->execute([
                ':nombre' => $data['nombre'],
                ':telefono' => $data['telefono'],
                ':email' => $data['email'],
                ':descripcion' => $data['descripcion'],
                ':direccion' => $data['direccion']
            ]);
            return ['success' => true, 'id' => $db->lastInsertId()];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public static function eliminarPDO($db, $id) {
        try {
            $stmt = $db->prepare("DELETE FROM proveedores WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}