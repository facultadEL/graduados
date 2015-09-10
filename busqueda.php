<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<html>
<head>
<title> Listado Graduados </title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style type="text/css">
	label {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
	#tabla {background: #F2F2F2;}
	#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1.5em;}
	l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
</style>
</head>
<body link="#000000" vlink="#000000" alink="#FFFFFF">
<?php
include_once "conexion.php";
$palabra = $_REQUEST['palabra'];
if ($palabra == "grado" || $palabra == "Grado"){
$resultado = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno, numerodni_alumno,nombre_nivel_carrera,carrera.nombre_carrera,id_nivel_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) WHERE carrera_alumno = id_carrera AND 
   UPPER(nombre_alumno)        LIKE UPPER('%{$_REQUEST['palabra']}%')
or UPPER(apellido_alumno)	   LIKE UPPER('%{$_REQUEST['palabra']}%')
or UPPER(nombre_carrera)	   LIKE UPPER('%{$_REQUEST['palabra']}%')
or UPPER(nombre_nivel_carrera) LIKE UPPER('{$_REQUEST['palabra']}')
or UPPER(numerodni_alumno)	   LIKE UPPER('%{$_REQUEST['palabra']}%') ORDER BY id_nivel_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
}else{
$resultado = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno, numerodni_alumno,nombre_nivel_carrera,carrera.nombre_carrera,id_nivel_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) WHERE carrera_alumno = id_carrera AND 
   UPPER(nombre_alumno)        LIKE UPPER('%{$_REQUEST['palabra']}%')
or UPPER(apellido_alumno)	   LIKE UPPER('%{$_REQUEST['palabra']}%')
or UPPER(nombre_carrera)	   LIKE UPPER('%{$_REQUEST['palabra']}%')
or UPPER(nombre_nivel_carrera) LIKE UPPER('%{$_REQUEST['palabra']}%')
or UPPER(numerodni_alumno)	   LIKE UPPER('%{$_REQUEST['palabra']}%') ORDER BY id_nivel_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
}
echo '<table align="center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="6" align="center"><l1>Listado de Graduados</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000">';
		echo '<td align="center"><strong><label>Foto</label></strong></td>';
		echo '<td align="center"><strong><label>Alumno</label></strong></td>';
		echo '<td align="center"><strong><label>Nivel Carrera</label></strong></td>';
		echo '<td align="center"><strong><label>Carrera</label></strong></td>';
		echo '<td align="center"><strong><label>Ver Graduado</label></strong></td>';
		echo '<td align="center"><strong><label>Seguimiento</label></strong></td>';
	echo '<tr>';
while($row=pg_fetch_array($resultado,NULL,PGSQL_ASSOC)){
	echo '<tr>';
		if ($row['foto_alumno'] != ''){
			echo '<td align="center" cellpadding="0"><a href="registrarGraduado.php?idAlumno='.$row['id_alumno'].'"><img src='.$row['foto_alumno'].' width="50" height="50"></a></td>';
		}else{
			echo '<td align="center" cellpadding="0"><a href="registrarGraduado.php?idAlumno='.$row['id_alumno'].'"><img src="faltaFoto2.png" width="50" height="50"></a></td>';
		}
		echo '<td align="center"><l2>'.$row['apellido_alumno'].', '.$row['nombre_alumno'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['nombre_nivel_carrera'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['nombre_carrera'].'</l2></td>';
		echo '<td align="center"><a href="verAlumno.php?idAlumno='.$row['id_alumno'].'"><input type="image" src="ver.png" width="40" height="40" value="Opciones" /></a></td>';
		echo '<td align="center"><a href="listadoSeguimiento.php?idAlumno='.$row['id_alumno'].'"><input type="image" src="seguimiento.png" width="60" height="40" value="Opciones" /></a></td>';
	echo '<tr>';
}
echo '</table>';
?>
<p>
<a href="listadoAlumno.php"><center><input type="button" value="Atr&aacute;s"></center></a>
</p>
</body>
</html>