<?php
namespace Model;

class Usuario extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','dni','nombre','admin','contraseña','email','token'];

    public $id;
    public $dni;
    public $nombre;
    public $admin;
    public $contraseña;
    public $email;
    public $token;

    public function __construct($args=[]) {
        $this->dni = $args['id'] ?? NULL;
        $this->dni = $args['dni'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->contraseña = $args['contraseña'] ?? '';
        $this->email = $args['email'] ?? NULL;
        $this->token = $args['token'] ?? NULL;
    }

    public function validarLogin() {
        if (!$this->contraseña) {
            self::$alertas['error'][]= 'El campo contraseña es obligatorio';
        }
        return self::$alertas;
    }
    public function validarCambioContraseña($repContraseña) {
        if (!$this->contraseña || !$repContraseña) {
            self::$alertas['error'][]= 'Todos los campos son obligatorios';
        } 
        if (strlen($this->contraseña) < 8) {
            self::$alertas['error'][]= 'La contraseña debe tener al menos 8 caracteres';
        } 
        if ($this->contraseña !== $repContraseña) {
            self::$alertas['error'][]= 'Las contraseñas no coinciden';
        }
        return self::$alertas;
    }


    public function comprobarPassword($contraseña) {
        $resultado = password_verify($contraseña, $this->contraseña);
        
        if (!$resultado) {
            return false;
        } else {
            return true;
        }
    }

    public function validarEmail () {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        } 
        return self::$alertas;
    }

    public function hashPassword() {
        $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);
    }
    
    public function CrearToken() {
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