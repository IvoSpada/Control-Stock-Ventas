<?php

namespace Model;

class Especificaciones extends ActiveRecord {
    protected static $tabla = 'Especificaciones';
    protected static $columnasDB = ['id', 'productoID', 'talla', 'color', 'stock'];

    public $id;
    public $productoID;
    public $talla;
    public $color;
    public $stock;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->productoID = $args['productoID'] ?? null;
        $this->talla = $args['talla'] ?? '';
        $this->color = $args['color'] ?? '';
        $this->stock = $args['stock'] ?? 0;
    }
}
