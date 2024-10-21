<?php
namespace Model;

class DetalleVenta extends ActiveRecord {
    protected static $tabla = 'DetalleVenta';
    protected static $columnasDB = ['id', 'ventaID', 'productoID', 'especificacionesID', 'cantidad', 'subtotal'];

    public $id;
    public $ventaID;
    public $productoID;
    public $especificacionesID;
    public $cantidad;
    public $subtotal;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->ventaID = $args['ventaID'] ?? null;
        $this->productoID = $args['productoID'] ?? null;
        $this->especificacionesID = $args['especificacionesID'] ?? null;
        $this->cantidad = $args['cantidad'] ?? 0;
        $this->subtotal = $args['subtotal'] ?? 0;
    }
}
