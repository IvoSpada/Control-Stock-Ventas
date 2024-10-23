<?php
namespace Model;

class Proveedor extends ActiveRecord {
    protected static $tabla = 'proveedores';
    protected static $columnasDB = ['id', 'nombre', 'contacto', 'email', 'descripcion'];

    public $id;
    public $nombre;
    public $contacto;
    public $email;
    public $descripcion;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->contacto = $args['contacto'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->contacto) {
            self::$alertas['error'][] = 'El contacto es obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción es obligatoria';
        }

        return self::$alertas;
    }
}
