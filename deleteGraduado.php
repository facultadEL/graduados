<?php

include_once "conexion.php";
include_once "libreria.php";

$idGraduado = $_REQUEST['idGraduado'];

$sqlEliminarSeguimiento = "DELETE FROM seguimiento_alumno WHERE alumno_fk=$idGraduado;";
$sqlEliminarTelefonos = "DELETE FROM telefonos_del_alumno WHERE alumno_fk=$idGraduado;";
$sqlEliminarAlumnosPorGrupo = "DELETE FROM alumnos_por_grupo WHERE alumno_fk=$idGraduado;";
$sqlEliminarAlumno = "DELETE FROM alumno WHERE id_alumno=$idGraduado;";

$sqlEliminar = $sqlEliminarSeguimiento.$sqlEliminarTelefonos.$sqlEliminarAlumnosPorGrupo.$sqlEliminarAlumno;
$error = 1;
$error = guardarSql($sqlEliminar);
include_once "cerrar_conn.php";
echo $error;
?>