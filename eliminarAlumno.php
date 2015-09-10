
<?php
include 'conexion.php';

$id_Alumno = $_REQUEST['idAlumno'];

pg_query("DELETE FROM telefonos_del_alumno WHERE alumno_fk = $id_Alumno");
pg_query("DELETE FROM alumno WHERE id_alumno = $id_Alumno");


echo '<script type="text/javascript">
		alert("El alumno ha sido eliminado");
		window.location="listadoAlumno.php"
	 </script>';
?>
