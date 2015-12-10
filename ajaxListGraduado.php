<?php

include_once "conexion.php";

$cbo_grado = (empty($_REQUEST['cbo_grado'])) ? 0 : $_REQUEST['cbo_grado'];
$cbo_carrera = (empty($_REQUEST['cbo_carrera'])) ? 0 : $_REQUEST['cbo_carrera'];

$contador = 0;
$sep = '/--/';
$sep2 = '/--/--/';
$sep3 = '/--/--/--/';

$sql = "SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno,carrera.nombre_carrera,nivel_carrera.nombre_nivel_carrera,numerodni_alumno FROM alumno INNER JOIN carrera ON carrera.id_carrera = alumno.carrera_alumno INNER JOIN nivel_carrera ON carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera ";
$orden = " ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC;";
if ($cbo_grado != 0 && $cbo_carrera != 0) {
	$condicion = ' WHERE id_nivel_carrera = '.$cbo_grado.' AND id_carrera = '.$cbo_carrera.$orden;
}elseif ($cbo_grado != 0 && $cbo_carrera == 0) {
	$condicion = ' WHERE id_nivel_carrera = '.$cbo_grado.$orden;
}elseif ($cbo_grado == 0 && $cbo_carrera != 0) {
	$condicion = ' WHERE id_carrera = '.$cbo_carrera.$orden;
}elseif ($cbo_grado == 0 && $cbo_carrera == 0) {
	$condicion = $orden;
}
$sql_final = pg_query($sql.$condicion);

$total = '';
$stringGraduado = '';
while($row = pg_fetch_array($sql_final)){
	$contador = $contador + 1;

	$foto = $row['foto_alumno'];
	$stringGraduado .= $contador.$sep.$foto.$sep.$row['apellido_alumno'].$sep.$row['nombre_alumno'].$sep.$row['nombre_nivel_carrera'].$sep.$row['nombre_carrera'].$sep.$row['id_alumno'].$sep.$row['numerodni_alumno'].$sep2;
}

include_once "cerrar_conn.php";

echo $contador.$sep3.$stringGraduado;
?>
