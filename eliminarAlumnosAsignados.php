<?php
include_once "conexion.php";
$id_Grupo = $_REQUEST['idGrupo'];
$id_eliminar_alumno = $_REQUEST['idEliminarAlumno'];

pg_query("DELETE FROM alumnos_por_grupo WHERE grupo_fk = $idGrupo AND alumno_fk = $id_eliminar_alumno");


echo '<script type="text/javascript">	window.location="verGrupo.php?idGrupo='.$id_Grupo.'"; </script>';
?>