<?php
include_once "conexion.php";
$id_Alumno = $_REQUEST['idAlumno'];
$eliminar = $_REQUEST['eliminar'];
$idEliminarTA = $_REQUEST['idEliminarTA'];

echo 'id_Alumno: '.$id_Alumno;

if ($eliminar == 1){
	pg_query("DELETE FROM telefonos_del_alumno WHERE id_telefonos_del_alumno = $idEliminarTA");
}

echo '<script type="text/javascript">
		window.location="registrarDatosExtraGraduado.php?control=2&idAlumno='.$id_Alumno.'";
	 </script>';
	 
//control igual a 2 para que sea distinto a los otros controles que hay y que entre al else
?>