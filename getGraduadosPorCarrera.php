<?php

include_once "conexion.php";

$idCarrera = $_POST['idCarrera'];

$cGraduados = "SELECT id_alumno,nombre_alumno,apellido_alumno,mail_alumno FROM alumno WHERE carrera_alumno='$idCarrera' AND mail_alumno IS NOT NULL AND mail_alumno != '' AND suscrito IS TRUE;";
$sGraduados = pg_query($cGraduados);

$outJson = '[';
while($rGraduados = pg_fetch_array($sGraduados))
{
	if($outJson!= '[')
	{
		$outJson .= ',';
	}

	$id = $rGraduados['id_alumno'];
	$nombre = empty($rGraduados['nombre_alumno']) ? "" : ucwords(strtolower($rGraduados['nombre_alumno']));
	$apellido = empty($rGraduados['apellido_alumno']) ? "" : ucwords(strtolower($rGraduados['apellido_alumno']));
	$mail = empty($rGraduados['mail_alumno']) ? "" : $rGraduados['mail_alumno'];
			
	$outJson .= '{
		"id":"'.$id.'",
		"nombre":"'.$nombre.'",
		"apellido":"'.$apellido.'",
		"mail":"'.$mail.'"
	}';
}

$outJson .= ']';

pg_close($conn);

echo $outJson;

?>