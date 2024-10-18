<?php
namespace Model;

class Usuario extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','usuario','contraseña'];

    public $id;
    public $usuario;
    public $contraseña;

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? NULL;
        $this->usuario = $args['usuario'] ?? '';
        $this->contraseña = $args['contraseña'] ?? '';
    }
}


?>