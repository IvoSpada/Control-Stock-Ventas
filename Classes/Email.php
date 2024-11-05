<?php

namespace classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

        $mail = new PHPMailer();
        
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;
        $mail->Username = '7296ff58b72e1e';
        $mail->Password = '5e2fd179f181c5';

        $mail->setFrom('cuentas@hbtech.com', 'HB Technologies');
        $mail->addAddress('cuentas@hbtech.com', 'HB-Technologies.com');
        $mail->Subject = 'Confirma Tu Cuenta';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> has ingresado tu mail, solo debes confirmarlo presionando el enlace</p>";
        $contenido .="<p>Presiona aquí: <a href='http://localhost:3000/confirmar?token=" . $this->token . "'>Confirmar E-Mail</a></p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar 
        $mail->send();

    }   

    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;
        $mail->Username = 'ae4e91053a619f';
        $mail->Password = '4a6172ded3b72c';

        $mail->setFrom('cuentas@hbtech.com', 'HB Technologies');
        $mail->addAddress('cuentas@hbtech.com', 'HB-Technologies.com');
        $mail->Subject = 'Restablecer Password';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .="<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer Password</a></p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar 
        $mail->send();
    }
}