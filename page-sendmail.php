<?php
if (isset($_POST['email']) && $_POST['email'] != "") {
    
    $from                   = trim($_POST['email']);
    $nombre                 = utf8_decode($_POST['nombre']);
    $telefono               = utf8_decode($_POST['telefono']);
    $email                  = utf8_decode($_POST['email']);
    $comentario             = utf8_decode($_POST['comentario']);

    require_once('./PHPMailer/class.phpmailer.php');

    $mail = new PHPMailer(true);
    $mail->From = $email;
    $mail->FromName = $nombre;
    
    $mail->addAddress('contacto@vitavi.mx', 'Mail de Contacto VITAVI');
    $mail->addReplyTo($email, $nombre);
    $mail->addBCC("tony@blueterrier.mx");
    $mail->isHTML(true);
    $mail->Subject = "Contacto VITAVI";
    $mail->Body = "<p>". $nombre ." escribi&oacute;: </p>";
    $mail->Body.= "<p><b>Email: </b>". $email ."</p>";
    $mail->Body.= "<p><b>Telefono: </b>". $telefono ."</p>";
    $mail->Body.= "<p><b>Comentario: </b>". $comentario ."</p>";
    $mail->Body.= "<p><b>Newsletter: </b>". $newsletter ."</p>";
    
    
    $mail->AltBody = "Nombre: " . $nombre;
    $mail->AltBody .= " // " . $ciudad;
    $mail->AltBody .= " // " . $telefono;
    $mail->AltBody .= " // " . $email;
    $mail->AltBody .= " // " . $comentario;
    $mail->AltBody .= " // " . $newsletter;

    if(!$mail->send()) { echo "Mailer Error: " . $mail->ErrorInfo; }
    
    else {echo "Message has been sent successfully"; }

}