<html>
<head>
<title> Nuevo Grupo </title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style type="text/css">
	label {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
	#tabla {background: #F2F2F2;}
	#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1.5em;}
	l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
	l3 {font-family: Cambria;color: #424242; padding: .12em;}
	a { text-decoration:none }
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
		document.buscador.submit(); 
	}
	</script>
</head>
<body link="#000000" vlink="#000000" alink="#FFFFFF">
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Informaci&oacute;n de Grupo</FONT></legend>
<?php
include_once "conexion.php";
$contador = 0;
$id_Grupo = $_REQUEST['idGrupo'];
$datosGrupo = pg_query("SELECT * FROM grupo_alumnos WHERE id_grupo_alumnos = '$id_Grupo'");
$row=pg_fetch_array($datosGrupo,NULL,PGSQL_ASSOC);
	$nombre_grupo = $row['nombre_grupo'];
	$descripcion_grupo = $row['descripcion_grupo'];
$grupo = pg_query("SELECT nombre_alumno,apellido_alumno, foto_alumno,carrera_alumno,id_alumnos_por_grupo,grupo_fk,alumno_fk,id_grupo_alumnos,nombre_grupo,descripcion_grupo,id_carrera,nombre_carrera,nombre_nivel_carrera FROM alumnos_por_grupo INNER JOIN grupo_alumnos ON(grupo_alumnos.id_grupo_alumnos = alumnos_por_grupo.grupo_fk) INNER JOIN alumno ON(alumno.id_alumno = alumnos_por_grupo.alumno_fk) INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) WHERE id_grupo_alumnos = '$id_Grupo' ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
echo '<table align="center" cellspacing="1" width="100%" cellpadding="4" border="1" bgcolor="#585858" id="tabla">';
	echo '<tr bgcolor="#FFFFFF" width="100%">';
		echo '<td id="titulo3" colspan="5" align="center"><l1>Grupo: '.$nombre_grupo.'</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#FFFFFF" width="100%">';
		echo '<td id="titulo3" colspan="5" align="center"><l3>'.$descripcion_grupo.'</l3></td>';
	echo '</tr>';
	echo '<tr bgcolor="#FFFFFF" width="100%">';
		echo '<td id="titulo3" colspan="5" align="center"><a href="verGrupo.php?idGrupo='.$id_Grupo.'"><input type="button" value="Eliminar/Asignar Graduados"></a></td>';
	echo '</tr>';
	echo '<tr bgcolor="#FFFFFF" width="100%">';
		echo '<td colspan="5" align="center"><a href="imprimirListadoGrupo.php?idGrupo='.$id_Grupo.'"><img src="print.png" width="50" height="50"></a>&nbsp;&nbsp;&nbsp;<a href="listadoGrupoExcel.php?idGrupo='.$id_Grupo.'"><img src="excel.png" width="50" height="50"></a></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000" width="100%">';
		echo '<td align="center" width="10%"><strong><label>&nbsp;</label></strong></td>';
		echo '<td align="center" width="10%"><strong><label>Foto</label></strong></td>';
		echo '<td align="center" width="40%"><strong><label>Graduado</label></strong></td>';
		echo '<td align="center" width="5%"><strong><label>Nivel Carrera</label></strong></td>';
		echo '<td align="center" width="35%"><strong><label>Carrera</label></strong></td>';
	echo '<tr>';
while($row=pg_fetch_array($grupo,NULL,PGSQL_ASSOC)){
	$id_Alumno = $row['alumno_fk'];
	$nombre_alumno = $row['nombre_alumno'];
	$apellido_alumno = $row['apellido_alumno'];
	$nombre_carrera = $row['nombre_carrera'];
	$nivel_carrera = $row['nombre_nivel_carrera'];
	$contador = $contador + 1;
	echo '<tr>';
		echo '<td align="center"><l2>'.$contador.'</l2></td>';
		if ($row['foto_alumno'] != ''){
			echo '<td align="center" cellpadding="0"><a href="verAlumno.php?idAlumno='.$id_Alumno.'"><img src='.$row['foto_alumno'].' width="50" height="50"></a></td>';
		}else{
			echo '<td align="center" cellpadding="0"><a href="verAlumno.php?idAlumno='.$id_Alumno.'"><img src="faltaFoto2.png" width="50" height="50"></a></td>';
		}
		echo '<td align="left"><l2>'.$apellido_alumno.', '.$nombre_alumno.'</l2></td>';
		echo '<td align="center"><l2>'.$nivel_carrera.'</l2></td>';
		echo '<td align="center"><l2>'.$nombre_carrera.'</l2></td>';
	echo '</tr>';
	}
echo '</table>';
?>
</fieldset>
<p>
<center>
<table>
	<tr>
		<td colspan="2" align="center"><a href="imprimirListadoGrupo.php?imprimir=1&excel=0"><img src="print.png" width="50" height="50"></a>&nbsp;&nbsp;&nbsp;<a href="imprimirListadoGrupo.php?imprimir=0&excel=1"><img src="excel.png" width="50" height="50"></a></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<a href="crearGrupoConsulta.php"><input type="button" value="Atr&aacute;s"></a>
		</td>
	</tr>
</table>
</center>
</p>
</body>
</html>