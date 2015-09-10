<?php
include_once 'conexion.php';

$nombre_grupo = $_REQUEST['nombre_grupo'];
$descripcion_grupo = $_REQUEST['descripcion_grupo'];
$id_Grupo = $_REQUEST['idGrupo'];
$modificar = $_REQUEST['modificar'];

if ($modificar == 1){
	$modGrupo="UPDATE grupo_alumnos SET nombre_grupo='$nombre_grupo', descripcion_grupo='$descripcion_grupo' WHERE id_grupo_alumnos = $id_Grupo;";
	
	$error=0;

	if (!pg_query($conn, $modGrupo)) 
	 {
	 $errorpg = pg_last_error($conn);
	 $termino = "ROLLBACK";
	 $error=1;
	 }
	 else
	 {
	 $termino = "COMMIT";
	 }
	pg_query($termino);
	
	
}else{
	$newGrupo="INSERT INTO grupo_alumnos(nombre_grupo,descripcion_grupo)VALUES('$nombre_grupo','$descripcion_grupo')";

	$error=0;

	if (!pg_query($conn, $newGrupo)) 
	 {
	 $errorpg = pg_last_error($conn);
	 $termino = "ROLLBACK";
	 $error=1;
	 }
	 else
	 {
	 $termino = "COMMIT";
	 }
	pg_query($termino);
}
	
	
	$consultaMax = pg_query("SELECT max(id_grupo_alumnos) FROM grupo_alumnos");
	$rowMax = pg_fetch_array($consultaMax);
	$maximoGrupo = $rowMax['max'];
	$id_Grupo = $maximoGrupo;
	

	if ($error==1){
		if ($modificar == 1){
			echo '<script language="JavaScript"> 			alert("Los datos no se modificaron correctamente. Pongase en contacto con el administrador");</script>';
			echo $errorpg;
		}else{
			echo '<script language="JavaScript"> 			alert("Los datos no se modificaron correctamente. Pongase en contacto con el administrador");</script>';
			echo $errorpg;
		}
	}else{
		echo '<script language="JavaScript"> 
			window.location = "cargarAsignacion.php?grupoBuscar='.$id_Grupo.'";</script>';
	}
	
	
	
	
	
?>