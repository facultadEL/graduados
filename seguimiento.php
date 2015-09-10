<html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="jquery-latest.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Registro de Graduado</title>
	<style type="text/css">
		{font-family: Cambria }
			{font-family: Cambria }			
			form {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			label {width: 10em;color: #336699; float: left;margin-right: 30px; font-family: Cambria; padding-left: .5em;}
			label.error {font-family: Cambria;float: none;vertical-align: top;color: red;padding-left: .5em;}
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
		
		function evaluaring(academico)
	{
		document.f1.submit(); 
	}
		
		
		</script>

</head>

<body>
<?php
$id_Alumno = $_REQUEST['idAlumno'];

include_once "conexion.php";

$sqlAlumno = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno FROM alumno WHERE id_alumno = $id_Alumno");
$rowAlumno = pg_fetch_array($sqlAlumno);
	$nombre_alumno = $rowAlumno['nombre_alumno'];
	$apellido_alumno = $rowAlumno['apellido_alumno'];

$dia_seguimiento = date("d").'-'.date("m").'-'.date("Y");
$hora_seguimiento = date("H:i");
?>


<form class="formNuevoGraduado" name="f1" id="form2" action="guardarSeguimiento.php?control=0&idAlumno=<?php echo $id_Alumno ?>" method="post" enctype="multipart/form-data">
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Seguimiento: <?php echo $nombre_alumno.' '.$apellido_alumno; ?></FONT></legend>
<table>
	<tr>
		<td>
			<label for="cFecha">Fecha: </label>
			<input id="cFecha" name="dia_seguimiento" type="text" value="<?php echo $dia_seguimiento; ?>" size="22"/>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cHora">Hora: </label>
			<input id="cHora" name="hora_seguimiento" type="text" value="<?php echo $hora_seguimiento; ?>" size="22" />
		</td>
	</tr>
	<tr>
		<td>
			<label for="cTipoComunicacion">Tipo de Comunicaci&oacute;n: </label>
			<input id="cTipoComunicacion" name="tipo_comunicacion_seguimiento" type="text" value="" size="22"/>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cMotivoComunicacion">Motivo de Comunicaci&oacute;n: </label>
			<textarea id="cMotivoComunicacion" name="motivo_comunicacion_seguimiento" value="" cols="30" rows="5"></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<input class="submit" type="submit" value="Guardar"/>
			<a href="listadoSeguimiento.php?idAlumno=<?php echo $id_Alumno; ?>"><input type="button" value="Atr&aacute;s"></a>
		</td>
	</tr>
</table>
</form>
</fieldset>
</body>
</html>