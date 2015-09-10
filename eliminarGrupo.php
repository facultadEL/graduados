<?php
include_once "conexion.php";
$id_Grupo = $_REQUEST['idEliminarGrupo'];

pg_query("DELETE FROM alumnos_por_grupo WHERE grupo_fk = $id_Grupo");
pg_query("DELETE FROM grupo_alumnos WHERE id_grupo_alumnos = $id_Grupo");


echo '<script type="text/javascript"> window.location="crearGrupoConsulta.php";	 </script>';
?>