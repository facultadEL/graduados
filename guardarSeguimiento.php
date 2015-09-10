<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Registro de Graduado</title>
	<style type="text/css">
		{font-family: Cambria }			
			#contenedor {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			label {width: 13em;color: #336699; float: left; font-family: Cambria; padding-left: .5em;}
			label.error {font-family: Cambria; float: none; vertical-align: top; color: red; padding-left: .5em;}
			l1 {font-family: Cambria;color: #424242; text-transform: capitalize;}
			l3 {font-family: Cambria;color: #424242; text-transform: capitalize; width: 13em;}
			l2 {font-family: Cambria;color: #424242;}
    </style>
	<script>
		$(document).ready(function(){
		
		$.validator.addClassRules("rango", {range:[0,6]});
		$.validator.addClassRules("min", {minlength: 8});
		$.validator.addClassRules("minimo", {minlength: 2});
		$.validator.addClassRules("numCuil", {minlength: 7});
		$.validator.addClassRules("digitoCuil", {minlength: 1});
		$.validator.addClassRules("anio", {minlength: 4});
		$.validator.addClassRules("caracteristica", {minlength: 3});
		$.validator.addClassRules("telFijo", {minlength: 6});
		
		$('form').validate();
		$("#form1").validate();
		$("#form2").validate();
		
		
	});
	
	function evaluaring(academico){
		document.f1.submit(); 
	}
	</script>
</head>
<body>
<?php
include_once "conexion.php";

$id_Alumno = $_REQUEST['idAlumno'];
$dia_seguimiento = $_REQUEST['dia_seguimiento'];
$hora_seguimiento = $_REQUEST['hora_seguimiento'];
$tipo_comunicacion_seguimiento = $_REQUEST['tipo_comunicacion_seguimiento'];
$motivo_comunicacion_seguimiento = $_REQUEST['motivo_comunicacion_seguimiento'];
	
	
		$consultaMax = pg_query("SELECT max(id_seguimiento_alumno) FROM seguimiento_alumno");
		$rowMax = pg_fetch_array($consultaMax);
			$maximoSeguimiento = $rowMax['max'];
			$id_Seguimiento = $maximoSeguimiento+1;
		
		$newSeguimiento="INSERT INTO seguimiento_alumno(id_seguimiento_alumno, dia_seguimiento, hora_seguimiento, tipo_comunicacion_seguimiento, motivo_comunicacion_seguimiento, alumno_fk)VALUES('$id_Seguimiento','$dia_seguimiento','$hora_seguimiento','$tipo_comunicacion_seguimiento','$motivo_comunicacion_seguimiento','$id_Alumno')";

		$error=0;

		if (!pg_query($conn, $newSeguimiento)){
			$errorpg = pg_last_error($conn);
			$termino = "ROLLBACK";
			$error=1;
		}else{
			$termino = "COMMIT";
		}
	   	pg_query($termino);
			
	if ($error==1){
		echo '<script language="JavaScript"> 			alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador");</script>';
		echo $errorpg;
	}else{
		echo '<script language="JavaScript"> alert("Los datos se guardaron correctamente."); window.location = "listadoSeguimiento.php?idAlumno='.$id_Alumno.'";</script>';		
	}
?>
</body>
</html>