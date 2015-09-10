<?php

//Control usuario va a devolver una serie de numeros que representan exito o errores
/*
0 - Usuario no encontrado
1 - No Existe
2 - Existe
*/

include_once "conexion.php";

$nrodoc = $_POST["nrodoc"];

$control = 0;

$sql = pg_query("SELECT count(id_alumno) AS contar FROM alumno where numerodni_alumno = '$nrodoc'");
$rowSql = pg_fetch_array($sql);
	$contar = $rowSql['contar'];
	
	if ($contar > 0){
		echo '2';
		//break;
	}else{
		echo '1';
		//break;
	}
	
include_once "cerrar_conn.php";

?>