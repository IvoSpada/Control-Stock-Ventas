<?php
namespace Model;

class VentaCuentaCorriente extends ActiveRecord {
    protected static $tabla = 'VentaCuentaCorriente';
    protected static $columnasDB = ['ventaID', 'cuentaCorrienteID', 'fecha'];

    public $ventaID;
    public $cuentaCorrienteID;
    public $fecha;

    public function __construct($args = []) {
        $this->ventaID = $args['ventaID'] ?? null;
        $this->cuentaCorrienteID = $args['cuentaCorrienteID'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
    }
}
