<?php
// Importar clases PHPMailer en el espacio de nombres global
// Deben estar en la parte superior de su script, no dentro de una función
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Agrega las rutas de PHPMaile.php ; SMTP.php ; Exception.php 
require '/opt/lampp/htdocs/yourproyect/PHPMailer-master/src/PHPMailer.php';
require '/opt/lampp/htdocs/yourproyect/PHPMailer-master/src/SMTP.php';
require '/opt/lampp/htdocs/yourproyect/PHPMailer-master/src/Exception.php';

$mail = new PHPMailer(true);                              // Pasar `true` habilita excepciones
try {
    //Configuraciones de servidor
    $mail->SMTPDebug = 2;                                 // Habilitar salida de depuración detallada
    $mail->isSMTP();                                      // Configurar el remitente para usar SMTP
    $mail->Host = 'smtp.gmail.com';                  // Especificar servidores SMTP principales y de respaldo
    $mail->SMTPAuth = true;                               // Habilitar autenticación SMTP
    $mail->Username = 'example@gmail.com';             // Nombre usuario SMTP
    $mail->Password = '*yourpassword*';                           // Contraseña SMTP
    $mail->SMTPSecure = 'tls';                            // Habilitar encriptación SSL, TLS también es aceptado con el puerto 587
    $mail->Port = 587;                                    // TCP puerto para conectarse

    //Destinatarios
    $mail->setFrom('youremail@gmail.com', 'pablo(example)');          //Este es el correo electrónico desde el que envía su formulario
    $mail->addAddress('address@gmail.com', 'pablo(example)'); // Agregar una dirección de destinatario
    //$mail->addAddress('contacto@example.com');               // Nombre es opcional
    //$mail->addReplyTo('info@example.com', 'Información');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Archivos adjuntos
    //$mail->addAttachment('/var/tmp/archivo.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/imagen.jpg', 'nuevo.jpg');    // Nombre opcional

    //Contenido
    $mail->isHTML(true);                                  // Establecer formato de correo electrónico a HTML
    $mail->Subject = 'Este es mi mensaje de prueba';
    $mail->Body    = 'Este es el texto de mi mensaje, Hola!';
    //$mail->AltBody = 'Este es el cuerpo en texto plano para clientes de correo no HTML';

    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo 'El mensaje no pudo ser enviado.';
    echo 'Error de correo: ' . $mail->ErrorInfo;
}
?>