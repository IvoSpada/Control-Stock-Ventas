<?php
namespace Model;

class Caja extends ActiveRecord {
    protected static $tabla = 'Caja';
    protected static $columnasDB = ['id', 'usuariosID', 'fechaInicio', 'fechaFin', 'total_ventas', 'monto_total'];

    public $id;
    public $usuariosID;
    public $fechaInicio;
    public $fechaFin;
    public $total_ventas;
    public $monto_total;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->usuariosID = $args['usuariosID'] ?? null;
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->fechaFin = $args['fechaFin'] ?? null;
        $this->total_ventas = $args['total_ventas'] ?? 0;
        $this->monto_total = $args['monto_total'] ?? 0;
    }
}
