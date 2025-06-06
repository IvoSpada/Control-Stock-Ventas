<?php
namespace Model;

class Usuario extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','dni','nombre','admin','contrasena','email','token'];

    public $id;
    public $dni;
    public $nombre;
    public $admin;
    public $contrasena;
    public $email;
    public $token;

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? NULL;
        $this->dni = $args['dni'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->contrasena = $args['contrasena'] ?? '';
        $this->email = $args['email'] ?? NULL;
        $this->token = $args['token'] ?? NULL;
    }

    public function validarLogin() {
        if (!$this->contrasena) {
            self::$alertas['error'][]= 'El campo contrasena es obligatorio';
        }
        return self::$alertas;
    }

    public function validarCambioContrasena($repContrasena) {
        if (!$this->contrasena || !$repContrasena) {
            self::$alertas['error'][]= 'Todos los campos son obligatorios';
        } 
        if (strlen($this->contrasena) < 8) {
            self::$alertas['error'][]= 'La contrasena debe tener al menos 8 caracteres';
        } 
        if ($this->contrasena !== $repContrasena) {
            self::$alertas['error'][]= 'Las contrasenas no coinciden';
        }
        return self::$alertas;
    }

    public function comprobarPassword($contrasena) {
        $resultado = password_verify($contrasena, $this->contrasena);
        
        return $resultado;
    }

    public function validarEmail() {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        } 
        return self::$alertas;
    }

    public function hashPassword() {
        $this->contrasena = password_hash($this->contrasena, PASSWORD_BCRYPT);
    }
    
    public function crearToken() {
        $this->token = uniqid();
    }

    public static function sanitizarDatos(array $datos) {
        $datos_sanitizados = [];
        foreach ($datos as $key => $value) {
            // Sanitizar cada valor y agregarlo al array de salida
            $datos_sanitizados[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
        }
        return $datos_sanitizados;
    }
}
?>