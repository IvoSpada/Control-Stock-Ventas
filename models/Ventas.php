<?php

namespace Model;

class Ventas extends ActiveRecord {
    protected static $tabla = 'Ventas';
    protected static $columnasDB = ['id', 'total', 'fecha', 'cajaID', 'metodo_pago'];

    public $id;
    public $total;
    public $fecha;
    public $cajaID;
    public $metodo_pago;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->total = $args['total'] ?? 0;
        $this->fecha = $args['fecha'] ?? '';
        $this->cajaID = $args['cajaID'] ?? null;
        $this->metodo_pago = $args['metodo_pago'] ?? '';
    }
}
