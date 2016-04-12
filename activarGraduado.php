<?php

include_once "conexion.php";

$id = $_REQUEST['id'];

$c = "UPDATE alumno SET suscrito='TRUE',fecha_desuscripto='1970-01-01',motivo_desuscripto=NULL WHERE id_alumno='$id';";
echo $c;
$error = 0;
if (!pg_query($c)){
	$errorpg = pg_last_error($conn);
	$termino = "ROLLBACK";
	$error=1;
}else{
	$termino = "COMMIT";
}
pg_query($termino);

if ($error==1){
	echo '0';
}else{
	echo '1';
}

?>