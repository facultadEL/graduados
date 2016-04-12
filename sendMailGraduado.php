<?php

//echo $_REQUEST['c'];
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
	//$to = 'eze_olea_7@hotmail.com';
	$nombre = ucwords(strtolower($_REQUEST['name']));
	$apellido = ucwords(strtolower($_REQUEST['lastname']));
	$id = $_REQUEST['id'];
}

require ("PHPMailer_5.2.1/class.phpmailer.php");

$cuerpo = $_REQUEST['content'];
$asunto = $_REQUEST['title'];
$sendFrom = 'graduadosutnvillamaria@gmail.com';
$from_name = 'Graduados - FRVM';

$vMail = explode('@', $to);

$cuerpo = str_replace( "\n", '<br />', $cuerpo);
$cuerpo = str_replace( "{nombre}", $nombre, $cuerpo);
$cuerpo = str_replace( "{apellido}", $apellido, $cuerpo);

$cuerpo .= '<br /><br /> Si desea dejar de recibir estos correos haga click <a href="http://extension.frvm.utn.edu.ar/graduados/landUnsubscribe.php?to='.$vMail[0].'/--/'.$vMail[1].'&i='.$id.'">Aquí</a>';

include_once "datosMail.php";

if($exito){
	echo '1';
}else{
	echo '0'.$mail->ErrorInfo;
}


?>