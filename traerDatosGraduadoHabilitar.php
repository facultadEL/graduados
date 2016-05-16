<?php

include_once 'conexionApp.php';

$c = "SELECT * FROM alumno WHERE habilitado IS FALSE ORDER BY apellido_alumno, nombre_alumno;";

$s = pg_query($c);
$outJson = '[';
while($r = pg_fetch_array($s))
{
	if($outJson != '[')
	{
		$outJson .= ',';
	}

	$id = $r['id_alumno'];
	$nombre = ucwords(strtolower($r['nombre_alumno']));
	$apellido = ucwords(strtolower($r['apellido_alumno']));
	$mail = $r['mail_alumno'];
	$fechaInscripto = $r['fecha_inscripcion'];
	$telefono = '';

	$cT = "SELECT caracteristica_alumno,telefono_alumno FROM telefonos_del_alumno WHERE alumno_fk='$id';";
	$sT = pg_query($cT);
	while($rT = pg_fetch_array($sT))
	{
		if($telefono != '')
		{
			$telefono .= '<br/>';
		}
		$car = trim($rT['caracteristica_alumno']);
		$tel = trim($rT['telefono_alumno']);

		$telefono .= "$car - $tel ";
	}

	$outJson .= '{
		"id":"'.$id.'",
		"nombre":"'.$nombre.'",
		"apellido":"'.$apellido.'",
		"mail":"'.$mail.'",
		"telefono":"'.$telefono.'",
		"fechaInscripto":"'.$fechaInscripto.'"
	}';
}
$outJson .= ']';

pg_close($conn);

echo $outJson;
?>