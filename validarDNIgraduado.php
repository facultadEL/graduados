<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Validar DNI</title>
</head>
<body>
<?php
include_once "conexion.php";

$numDNI = $_REQUEST['numDNI'];
$consultaDNI = pg_query("SELECT count(id_alumno) AS total FROM alumno WHERE numerodni_alumno = '$numDNI'");
$rowConsultaDni = pg_fetch_array($consultaDNI,NULL,PGSQL_ASSOC);
$cantidad = $rowConsultaDni['total'];

if($cantidad > 0){
	echo '<script language="JavaScript"> alert("Graduado Existente!"); window.location = "listadoAlumno.php";</script>';
}else{
	echo '<script language="JavaScript"> window.location = "registrarGraduado.php?numDNI='.$numDNI.'";</script>';
}
?>
</body>
</html>