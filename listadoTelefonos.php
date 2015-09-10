<html>
<head>
<title> Tel&eacute;fonos </title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style type="text/css">
	label {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
	label1 {font-family: Cambria; padding: .5em; color: #0080FF;}
	#tabla {background: #F2F2F2;}
	#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	#titulo2 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1.5em;}
	l3 {font-family: Cambria;color: #0101DF; text-transform: capitalize; font-size: 1.5em;}
	l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
	a { text-decoration:none }
</style>
</head>
<body link="#000000" vlink="#000000" alink="#FFFFFF">
<?php
include_once 'conexion.php';
$contador = 0;
$alumno = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno FROM alumno ORDER BY nombre_alumno,apellido_alumno ASC");
echo '<table align="center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="4" align="center"><l1>Tel&eacute;fonos</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td colspan="4" align="center"><a href="listadoAlumno.php"><input type="button" value="Atr&aacute;s"/></a>&nbsp;&nbsp;&nbsp;<a href="listadoTelefonosExcel.php"><input type="button" value="Generar Excel"/></a></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000">';
		echo '<td align="center"><strong><label>&nbsp;</label></strong></td>';
		echo '<td align="center"><strong><label>Graduado</label></strong></td>';
		echo '<td align="center"><strong><label>Tel&eacute;fonos</label></strong></td>';
		echo '<td align="center"><strong><label1>Due&ntilde;o/a</label1></strong></td>';
	echo '<tr/>';
	$i = 1;
	$j = 1;
while($rowAlumno=pg_fetch_array($alumno,NULL,PGSQL_ASSOC)){
	$id_Alumno = $rowAlumno['id_alumno'];
	$nombre_alumno[$i] = $rowAlumno['nombre_alumno'].', '.$rowAlumno['apellido_alumno'];
	
$telefonos = pg_query("SELECT caracteristica_alumno,telefono_alumno,duenio_del_telefono,alumno_fk FROM telefonos_del_alumno WHERE alumno_fk = '$id_Alumno'");
while($rowTelefono=pg_fetch_array($telefonos,NULL,PGSQL_ASSOC)){
	$telefono_alumno = $rowTelefono['caracteristica_alumno'].'-'.$rowTelefono['telefono_alumno'];
	$duenio_del_telefono = $rowTelefono['duenio_del_telefono'];
	$alumno_fk = $rowTelefono['alumno_fk'];
	if ($j == $i && $alumno_fk == $id_Alumno){
		$contador = $contador + 1;
	}
	echo '<tr>';
		if ($j == $i && $alumno_fk == $id_Alumno){
			echo '<td align="center"><l2>'.$contador.'</l2></td>';
			echo '<td align="left"><l2>'.$nombre_alumno[$j].'</l2></td>';
			echo '<td align="center"><l2>'.$telefono_alumno.'</l2></td>';
			echo '<td align="center"><l2>'.$duenio_del_telefono.'</l2></td>';
		}else{
			echo '<td align="center"><l2>&nbsp;</l2></td>';
			echo '<td align="center"><l2>&nbsp;</l2></td>';
			echo '<td align="center"><l2>'.$telefono_alumno.'</l2></td>';
			echo '<td align="center"><l2>'.$duenio_del_telefono.'</l2></td>';
		}
		$j++;
	echo '<tr/>';
	}
	$i++;
	$j = $i;
}
echo '</table>';
?>
<p>
<center>
<table>
	<tr>
		<td><a href="listadoAlumno.php"><input type="button" value="Atr&aacute;s"/></a></td>
		<td>&nbsp;</td>
		<td><a href="listadoTelefonosExcel.php"><input type="button" value="Generar Excel"/></a></td>
	</tr>
</table>
</center>
</p>
</body>
</html>