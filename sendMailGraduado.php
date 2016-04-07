<?php

$to = $_REQUEST['mail'];
//$to = 'eze_olea_7@hotmail.com';
//$to = 's_extension@frvm.utn.edu.ar';

require ("PHPMailer_5.2.1/class.phpmailer.php");

// $sendFrom = dirección remitente
// $from_name = nombre remitente
// $to = dirección a donde enviamos

$nombre = ucwords(strtolower($_REQUEST['name']));
$apellido = ucwords(strtolower($_REQUEST['lastname']));
$id = $_REQUEST['id'];

$cuerpo = $_REQUEST['content'];
$asunto = $_REQUEST['title'];
$sendFrom = 'graduados@frvm.utn.edu.ar';
$from_name = 'Graduados - FRVM';

$vMail = explode('@', $to);

$cuerpo = str_replace( "\n", '<br />', $cuerpo);
$cuerpo = str_replace( "{nombre}", $nombre, $cuerpo);
$cuerpo = str_replace( "{apellido}", $apellido, $cuerpo);

$cuerpo .= '<br /><br /> Si desea dejar de recibir estos correos haga click <a href="http://extension.frvm.utn.edu.ar/graduados/unsubscribe.php?to='.$vMail[0].'-'.$vMail[1].'&i='.$id.'">Aquí</a>';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl"; 
//$mail->Host = "smtp.frvm.utn.edu.ar"; // dirección del servidor
$mail->Host = "smtp.gmail.com"; // dirección del servidor
//$mail->Username = "graduados@frvm.utn.edu.ar"; // Usuario //VA OTRO MAIL, HAY QUE CREAR UN GMAIL CREO.
$mail->Username = "extensionfrvm@gmail.com"; // Usuario //VA OTRO MAIL, HAY QUE CREAR UN GMAIL CREO.

$mail->Password = "4537500frvm"; // Contraseña
//$mail->Password = "kaMeleon"; // Contraseña

$mail->Port = 465; // Puerto a utilizar
//$mail->From = $sendFrom; // dirección remitente
//$mail->SetFrom($sendFrom, $from_name);
//$mail->AddReplyTo($sendFrom,$from_name);
//$mail->FromName = $from_name; // nombre remitente

$mail->SetFrom($sendFrom, $from_name);

$mail->AddAddress($to, ''); // Esta es la dirección a donde enviamos

$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = $asunto; // Asunto
$mail->Body = $cuerpo; // Mensaje a enviar
//$mail->AltBody = "Hola mundo. Esta es la primer línean Acá continuo el mensaje"; // cuerpo alternativo del mensaje
//$mail->AddAttachment("imagenes/imagen.jpg", "imagen.jpg");
$mail->CharSet = 'UTF-8';
$exito = $mail->Send(); // Envía el correo.

if($exito){
	echo '1';
}else{
	echo '0'.$mail->ErrorInfo;
}


?>