<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){

        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '20f27cfed4eb24';
        $mail->Password = '4345d24443a4ed';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona Aqui: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // enviar el email
        $mail->send();
    }

    public function enviarInstrucciones(){
            // Crear el objeto de email
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '20f27cfed4eb24';
            $mail->Password = '4345d24443a4ed';
        
            $mail->setFrom('cuentas@appsalon.com');
            $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
            $mail->Subject = 'Reestablece tu password';
        
            $mail->isHTML(TRUE);
            $mail->CharSet = 'UTF-8';
        
            $contenido = "<html>";
            $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
            $contenido .= "<p>Presiona Aqui: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablecer Password</a></p>";
            $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
            $contenido .= "</html>";
        
            $mail->Body = $contenido;
        
            // enviar el email
            $mail->send();
    }
}