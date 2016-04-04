<?php

include_once "conexion.php";

$to = $_REQUEST['to'];
$id = $_REQUEST['i'];

$cUpdate = "UPDATE alumno SET suscrito='FALSE' WHERE id_alumno='$id';";

pg_query($cUpdate);

echo 'Usted se ha dado de baja correctamente. Muchas gracias.';

?>