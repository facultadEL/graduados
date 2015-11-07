<?php

include_once "conexion.php";
//$conn = pg_connect("host=localhost port=5432 user=postgres password=postgres dbname=graduados") or die("Error de conexion.".pg_last_error());

$from = (empty($_REQUEST['from'])) ? 0 : $_REQUEST['from'];
//$cbo_grado = $_POST["cbo_grado"];
$cbo_grado = (empty($_REQUEST['cbo_grado'])) ? 0 : $_REQUEST['cbo_grado'];
//$cbo_carrera = $_POST["cbo_carrera"];
$cbo_carrera = (empty($_REQUEST['cbo_carrera'])) ? 0 : $_REQUEST['cbo_carrera'];
$contador = 0;
$sep = '/--/';
$sep2 = '/--/--/';
$sep3 = '/--/--/--/';

if ($from == 1 && $cbo_grado != 0) {
	$sql = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno,carrera.nombre_carrera,nivel_carrera.nombre_nivel_carrera,numerodni_alumno FROM alumno INNER JOIN carrera ON carrera.id_carrera = alumno.carrera_alumno INNER JOIN nivel_carrera ON carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera WHERE id_nivel_carrera = $cbo_grado ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
}elseif($from == 2 && $cbo_carrera != 0){
	$sql = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno,carrera.nombre_carrera,nivel_carrera.nombre_nivel_carrera,numerodni_alumno FROM alumno INNER JOIN carrera ON carrera.id_carrera = alumno.carrera_alumno INNER JOIN nivel_carrera ON carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera WHERE id_carrera = $cbo_carrera ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
}else{
	$sql = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno,carrera.nombre_carrera,nivel_carrera.nombre_nivel_carrera,numerodni_alumno FROM alumno INNER JOIN carrera ON carrera.id_carrera = alumno.carrera_alumno INNER JOIN nivel_carrera ON carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
}

// while($row = pg_fetch_array($sql)){
// 	$contador = $contador + 1;
// 	if ($row['foto_alumno'] != ''){
// 		$foto = '<td class="text-center"><a href="registrarGraduado.php?idAlumno='.$row['id_alumno'].'"><img src='.$row['foto_alumno'].' width="50" height="50"></a></td>';
// 	}else{
// 		$foto = '<td class="text-center"><a href="registrarGraduado.php?idAlumno='.$row['id_alumno'].'"><i class="fa fa-user fa-2x user"></i></a></td>';
// 	}
// 	echo '<tr><td class="text-center">'.$contador.'</td>'.$foto.'<td class="text-center">'.$row['apellido_alumno'].', '.$row['nombre_alumno'].'</td><td class="text-center">'.$row['nombre_nivel_carrera'].'</td><td class="text-center">'.$row['nombre_carrera'].'</td><td class="text-center"><a href="verAlumno.php?idAlumno='.$row['id_alumno'].'"><i class="fa fa-eye fa-2x"></i></a></td><td class="text-center"><a href="listadoSeguimiento.php?idAlumno='.$row['id_alumno'].'"><i class="fa fa-refresh fa-2x"></i></a></td></tr>';
// }
$total = '';
$stringGraduado = '';
while($row = pg_fetch_array($sql)){
	$contador = $contador + 1;
	// if ($row['foto_alumno'] != ''){
	// 	$foto = '<img src='.$row['foto_alumno'].' width="50" height="50">';
	// }else{
	// 	$foto = '<i class="fa fa-user fa-2x user"></i>';
	// }
	$foto = $row['foto_alumno'];
	$stringGraduado .= $contador.$sep.$foto.$sep.$row['apellido_alumno'].$sep.$row['nombre_alumno'].$sep.$row['nombre_nivel_carrera'].$sep.$row['nombre_carrera'].$sep.$row['id_alumno'].$sep.$row['numerodni_alumno'].$sep2;
	//echo 'cargarGraduado('.$contador.',"'.$stringGraduado.'")';
	//$total .= $contador.$sep3.$stringGraduado;
	//echo '<script>cargarAlumno('.$contador.',"'.$stringAlumno.'")</script>';
}
echo $contador.$sep3.$stringGraduado;
//echo $total;

include_once "cerrar_conn.php";

?>
