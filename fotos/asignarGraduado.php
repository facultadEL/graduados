<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
$id_carrera_seleccionada = $_REQUEST['id_carrera_seleccionada'];
$id_nivel_carrera_seleccionada = $_REQUEST['id_nivel_carrera_seleccionada'];
$grupo_fk = $_REQUEST['id_grupo_seleccionado'];
//$cantTildados = 0;
// echo 'idCarrera: '.$id_carrera_seleccionada.'<br>';
// echo 'idNivel: '.$id_nivel_carrera_seleccionada.'<br>';
// echo 'idGrupo: '.$grupo_fk.'<br>';

include_once "conexion.php";
//obtengo la cantidad de alumnos segun la carrera seleccionada
//$cantidadAlumnos = pg_query("SELECT count(id_alumno) as cant FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) WHERE carrera_alumno = '$id_carrera_seleccionada'");
$cantidadAlumnos = pg_query("SELECT count(id_alumno) as cant FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) WHERE carrera_alumno = '$id_carrera_seleccionada'");
$rowCant=pg_fetch_array($cantidadAlumnos,NULL,PGSQL_ASSOC);
	$cant = $rowCant['cant'];

$cantGruposAsignados = pg_query("SELECT count(id_alumnos_por_grupo) as cant_grupos_asignados FROM alumnos_por_grupo");
$rowCantG=pg_fetch_array($cantGruposAsignados,NULL,PGSQL_ASSOC);
	$cantGruposAsignados = $rowCantG['cant_grupos_asignados'];
// $cantidadAlumnos = pg_query("SELECT count(id_alumnos_por_grupo) as cant_grupos_asignados FROM alumnos_por_grupo");
// $rowCant=pg_fetch_array($cantidadAlumnos,NULL,PGSQL_ASSOC);
// 	$cant = $rowCant['cant'];



// el for tiene almacenado la seleccion de los graduados a incluir en el grupo
for($i=0;$i<$cant+1;$i++){
	$seleccion = $_REQUEST['seleccion_graduado'.$i.''];
	$alumno_fk = $_REQUEST['id_graduado'.$i.''];

	if ($seleccion == 'Asignar'){
		// $cantTildados = $cantTildados + 1;
		// echo 't: '.$cantTildados;
		if ($cantGruposAsignados == 0){
			$asignarGraduado = "INSERT INTO alumnos_por_grupo(grupo_fk, alumno_fk)VALUES('$grupo_fk','$alumno_fk')";
			
			$error=0;

				if (!pg_query($conn, $asignarGraduado)) {
					$errorpg = pg_last_error($conn);
					$termino = "ROLLBACK";
					$error=1;
				}
				else{
					$termino = "COMMIT";
				}
				pg_query($termino);
					
				if ($error==1){
					echo '<script language="JavaScript"> 			alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador");</script>';
					echo $errorpg;
				}
			
		}else{
			$val = pg_query("SELECT * FROM alumnos_por_grupo WHERE grupo_fk = '$grupo_fk' AND alumno_fk = '$alumno_fk'");
			$rowAsignado=pg_fetch_array($val,NULL,PGSQL_ASSOC);
				$id_alumno_asignado_anteriormente = $rowAsignado['alumno_fk'];

			if ($id_alumno_asignado_anteriormente == NULL){
				$asignarGraduado = "INSERT INTO alumnos_por_grupo(grupo_fk, alumno_fk)VALUES('$grupo_fk','$alumno_fk')";
												

				$error=0;

				if (!pg_query($conn, $asignarGraduado)) {
					$errorpg = pg_last_error($conn);
					$termino = "ROLLBACK";
					$error=1;
				}
				else{
					$termino = "COMMIT";
				}
				pg_query($termino);
					
				if ($error==1){
					echo '<script language="JavaScript"> 			alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador");</script>';
					echo $errorpg;
				}
			}else{
				//alumnos asignados ver como hacer para mostrarlos...
			}
		}
	}
		// if ($cantTildados == 0){
			// echo '<script language="JavaScript"> alert("No seleccionó ning&uacute;n alumno para asignaci&oacute;n."); window.location = "cargarAsignacion.php?carreraBuscar='.$id_carrera_seleccionada.'&grupoBuscar='.$grupo_fk.'";</script>';
		// }
}
if ($error==0){
	echo '<script language="JavaScript"> alert("Los datos se guardaron correctamente."); window.location = "cargarAsignacion.php?carreraNivelBuscar='.$id_nivel_carrera_seleccionada.'&carreraBuscar='.$id_carrera_seleccionada.'&grupoBuscar='.$grupo_fk.'";</script>';
}

?>