<?php
namespace Model;

class Productos extends ActiveRecord {
    protected static $tabla = 'Productos';
    protected static $columnasDB = ['id', 'nombre', 'precio', 'descripcion', 'marca', 'proveedor', 'categoriaID'];

    public $id;
    public $nombre;
    public $precio;
    public $descripcion;
    public $marca;
    public $proveedor;
    public $categoriaID;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? 0;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->marca = $args['marca'] ?? '';
        $this->proveedor = $args['proveedor'] ?? '';
        $this->categoriaID = $args['categoriaID'] ?? null;
    }
}
