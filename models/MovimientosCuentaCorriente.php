<?php

namespace Model;

class MovimientosCuentaCorriente extends ActiveRecord {
    protected static $tabla = 'MovimientosCuentaCorriente';
    protected static $columnasDB = ['id', 'cuentaCorrienteID', 'tipo_movimiento', 'monto', 'fecha', 'detalle'];

    public $id;
    public $cuentaCorrienteID;
    public $tipo_movimiento;
    public $monto;
    public $fecha;
    public $detalle;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->cuentaCorrienteID = $args['cuentaCorrienteID'] ?? null;
        $this->tipo_movimiento = $args['tipo_movimiento'] ?? '';
        $this->monto = $args['monto'] ?? 0;
        $this->fecha = $args['fecha'] ?? '';
        $this->detalle = $args['detalle'] ?? '';
    }
}
