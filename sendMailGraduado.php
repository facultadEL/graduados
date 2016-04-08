<?php

echo $_REQUEST['c'];
if($_REQUEST['c'] == 't')
{
	$to = empty($_REQUEST['to']) ? 'eze_olea_7@hotmail.com' : $_REQUEST['to'];
	$nombre = $_REQUEST['n'];
	$apellido = $_REQUEST['a'];
	$id = -1;
}
else
{
	$to = $_REQUEST['mail'];
	$nombre = ucwords(strtolower($_REQUEST['name']));
	$apellido = ucwords(strtolower($_REQUEST['lastname']));
	$id = $_REQUEST['id'];
}

require ("PHPMailer_5.2.1/class.phpmailer.php");

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

$mail->From = $sendFrom; // Mail de origen
$mail->FromName = $from_name; // Nombre del que envia

$mail->AddAddress($to, ''); // Esta es la dirección a donde enviamos

$mail->AddReplyTo($sendFrom);

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