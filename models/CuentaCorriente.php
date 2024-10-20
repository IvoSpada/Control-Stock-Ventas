<?php
namespace Model;

class CuentaCorriente extends ActiveRecord {
    protected static $tabla = 'CuentaCorriente';
    protected static $columnasDB = ['id', 'nombre_apellido', 'saldo_actual'];

    public $id;
    public $nombre_apellido;
    public $saldo_actual;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre_apellido = $args['nombre_apellido'] ?? '';
        $this->saldo_actual = $args['saldo_actual'] ?? 0;
    }
}
