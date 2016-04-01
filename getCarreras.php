<?php

include_once "conexion.php";

$c = "SELECT * FROM carrera ORDER BY nivel_carrera_fk ASC, id_carrera ASC;";
$s = pg_query($c);
$outJson = '[';
while($r = pg_fetch_array($s))
{
	if($outJson!= '[')
	{
		$outJson .= ',';
	}

	$id = $r['id_carrera'];
	$nombre = $r['nombre_carrera'];
			
	$outJson .= '{
		"id":'.$id.',
		"nombre":"'.$nombre.'"
	}';
}

$outJson .= ']';

pg_close($conn);

echo $outJson;
?>