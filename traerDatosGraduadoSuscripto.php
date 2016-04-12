<?php

include_once 'conexion.php';

$c = "SELECT * FROM alumno WHERE suscrito IS FALSE;";

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
	$suscrito = $r['suscrito'];
	$fechaDesuscripto = $r['fecha_desuscripto'];
	$motivo = empty($r['motivo_desuscripto']) ? '' : $r['motivo_desuscripto'];
	$telefono = '';

	$cT = "SELECT caracteristica_alumno,telefono_alumno FROM telefonos_del_alumno WHERE alumno_fk='$id';";
	$sT = pg_query($cT);
	while($rT = pg_fetch_array($sT))
	{
		if($telefono != '')
		{
			$telefono .= '<br/>';
		}
		$car = $rT['caracteristica_alumno'];
		$tel = $rT['telefono_alumno'];

		$telefono .= "$car - $tel ";
	}

	$outJson .= '{
		"id":"'.$id.'",
		"nombre":"'.$nombre.'",
		"apellido":"'.$apellido.'",
		"mail":"'.$mail.'",
		"telefono":"'.$telefono.'",
		"suscrito":"'.$suscrito.'",
		"motivo":"'.$motivo.'",
		"fechaDesuscripto":"'.$fechaDesuscripto.'"
	}';
}
$outJson .= ']';

pg_close($conn);

echo $outJson;
?>