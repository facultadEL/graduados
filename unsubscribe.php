<?php

include_once "conexion.php";

$id = $_REQUEST['id'];
$motivo = $_REQUEST['motivo'];
$fecha = date('Y-m-d');
$cUpdate = "UPDATE alumno SET suscrito='FALSE',motivo_desuscripto='$motivo',fecha_desuscripto='$fecha' WHERE id_alumno='$id';";
pg_query($cUpdate);

$c = "SELECT nombre_alumno,apellido_alumno,mail_alumno FROM alumno WHERE id_alumno='$id';";
$s = pg_query($c);
$r = pg_fetch_array($s);

$nombre = $r['nombre_alumno'];
$apellido = $r['apellido_alumno'];
$mail = $r['mail_alumno'];

require ("PHPMailer_5.2.1/class.phpmailer.php");

$cuerpo = "El siguiente alumno se ha dado de baja: <br/> <b>ID:</b> {id} <br/> <b>Nombre:</b> {nombre} <br/> <b>Apellido:</b> {apellido} <br/> <b>Mail:</b> {mail} <br/> <b>Motivo:</b> {motivo} <br/> <b>Sistema origen:</b> Graduados";
$asunto = "Graduado dado de baja";
$sendFrom = 'graduadosutnvillamaria@gmail.com';
$from_name = 'Servicio de Baja';

$to = 'graduadosutnvillamaria@gmail.com';
//$to = 'eze_olea_7@hotmail.com';

$cuerpo = str_replace( "{nombre}", $nombre, $cuerpo);
$cuerpo = str_replace( "{apellido}", $apellido, $cuerpo);
$cuerpo = str_replace( "{mail}", $mail, $cuerpo);
$cuerpo = str_replace( "{id}", $id, $cuerpo);
$cuerpo = str_replace( "{motivo}", $motivo, $cuerpo);

include_once "datosMail.php";

echo '1';

?>