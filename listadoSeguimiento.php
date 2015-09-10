<html>
<head>
<title> Listado Graduados </title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style type="text/css">
	label {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
	#tabla {background: #F2F2F2;}
	#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	#titulo2 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1.5em;}
	l3 {font-family: Cambria;color: #0040FF; text-transform: capitalize; font-size: 1.5em;}
	l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
	a { text-decoration:none }
</style>
</head>
<body link="#000000" vlink="#000000" alink="#FFFFFF">
<?php
$id_Alumno = $_REQUEST['idAlumno'];
include_once 'conexion.php';
$alumno = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno FROM alumno WHERE id_alumno = $id_Alumno");
$rowAlumno=pg_fetch_array($alumno,NULL,PGSQL_ASSOC);
	$nombre_alumno = $rowAlumno['nombre_alumno'];
	$apellido_alumno = $rowAlumno['apellido_alumno'];
	
$seguimiento = pg_query("SELECT * FROM seguimiento_alumno WHERE alumno_fk = $id_Alumno ORDER BY id_seguimiento_alumno DESC");
echo '<table align="center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="4" align="center"><l1>Seguimiento</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="4" align="center"><l1>'.$nombre_alumno.' '.$apellido_alumno.'</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="4" align="center"><a href="seguimiento.php?idAlumno='.$id_Alumno.'"><l3>Nuevo Seguimiento</l3></a></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000">';
		echo '<td align="center"><strong><label>D&iacute;a</label></strong></td>';
		echo '<td align="center"><strong><label>Hora</label></strong></td>';
		echo '<td align="center"><strong><label>Tipo Comunicaci&oacute;n</label></strong></td>';
		echo '<td align="center"><strong><label>Motivo Comunicaci&oacute;n</label></strong></td>';
	echo '</tr>';
while($row=pg_fetch_array($seguimiento,NULL,PGSQL_ASSOC)){
	echo '<tr>';
		echo '<td align="center"><l2>'.$row['dia_seguimiento'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['hora_seguimiento'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['tipo_comunicacion_seguimiento'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['motivo_comunicacion_seguimiento'].'</l2></td>';
	echo '</tr>';
}
echo '</table>';
?>
<p>
<a href="listadoAlumno.php"><center><input type="button" value="Atr&aacute;s"></center></a>
</p>
</body>
</html>