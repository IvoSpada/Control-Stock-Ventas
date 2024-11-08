<?php
namespace Model;

class Proveedor extends ActiveRecord
{
    protected static $tabla = 'proveedores';
    protected static $columnasDB = ['id', 'nombre', 'telefono', 'email', 'descripcion'];

    public $id;
    public $nombre;
    public $telefono;
    public $email;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->telefono = $args['contacto'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = 'El contacto es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if (!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción es obligatoria';
        }

        return self::$alertas;
    }
    public function verificarContactos()
    {
        // Obtén todos los proveedores de la base de datos
        $proveedores = self::all(); // `all()` es un método común en ActiveRecord para obtener todos los registros

        $tipoContacto = [];

        // Itera sobre cada proveedor y verifica el tipo de contacto
        foreach ($proveedores as $proveedor) {
            if ($proveedor->email && $proveedor->telefono) {
                $tipoContacto[] = ['id' => $proveedor->id, 'tipo' => 'ambos'];
            } elseif ($proveedor->email) {
                $tipoContacto[] = ['id' => $proveedor->id, 'tipo' => 'email'];
            } elseif ($proveedor->telefono) {
                $tipoContacto[] = ['id' => $proveedor->id, 'tipo' => 'telefono'];
            } else {
                $tipoContacto[] = ['id' => $proveedor->id, 'tipo' => 'sin_contacto'];
            }
        }
        return $tipoContacto;
    }

    public function validarNuevoProveedor()
    {
        // Reiniciar alertas
        self::$alertas = ['error' => [], 'exito' => []];

        // Validar campo nombre
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre del proveedor es obligatorio';
        }

        // Validar campo email o celular (uno de los dos debe estar presente)
        if (!$this->email && !$this->telefono) {
            self::$alertas['error'][] = 'Debes proporcionar al menos un medio de contacto (email o celular)';
        }

        // Validar formato del email (si está presente)
        if ($this->email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El formato del email no es válido';
        }

        // Validar longitud del celular (si está presente)
        if ($this->telefono && strlen($this->telefono) < 10) {
            self::$alertas['error'][] = 'El número de celular debe tener al menos 10 dígitos';
        }

        return self::$alertas['error'];
    }
}
