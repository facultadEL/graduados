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
<form class="formBuscador" id="commentForm" name="buscador" action="busqueda.php" method="post">
	<center>
		<input id="cPalabra" type="text" name="palabra" value="" class="required"/>
	<p>
		<input type="submit" name="buscar" value="Buscar"/>
	</p>
		</center>
</form>
<?php
include_once 'conexion.php';
$contador = 0;
$val = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno,carrera.nombre_carrera,nombre_nivel_carrera FROM alumno full outer join carrera on(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) WHERE carrera_alumno = id_carrera  ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
echo '<table align="center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="7" align="center"><l1>Listado de Graduados</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="7" align="center"><a href="imprimirListadoGraduados.php?control=0"><input type="button" value="Imprimir"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="excelListadoGraduados.php?control=0"><input type="button" value="Excel"/></a></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000">';
		echo '<td align="center"><strong><label>&nbsp;</label></strong></td>';
		echo '<td align="center"><strong><label>Foto</label></strong></td>';
		echo '<td align="center"><strong><label>Alumno</label></strong></td>';
		echo '<td align="center"><strong><label>Nivel Carrera</label></strong></td>';
		echo '<td align="center"><strong><label>Carrera</label></strong></td>';
		echo '<td align="center"><strong><label>Ver Graduado</label></strong></td>';
		echo '<td align="center"><strong><label>Seguimiento</label></strong></td>';
	echo '</tr>';
while($row=pg_fetch_array($val,NULL,PGSQL_ASSOC)){
	$contador = $contador + 1;
	echo '<tr>';
		echo '<td align="center"><l2>'.$contador.'</l2></td>';
		if ($row['foto_alumno'] != ''){
			echo '<td align="center" cellpadding="0"><a href="registrarGraduado.php?idAlumno='.$row['id_alumno'].'"><img src='.$row['foto_alumno'].' width="50" height="50"></a></td>';
		}else{
			echo '<td align="center" cellpadding="0"><a href="registrarGraduado.php?idAlumno='.$row['id_alumno'].'"><img src="faltaFoto2.png" width="50" height="50"></a></td>';
		}
		echo '<td align="center"><l2>'.$row['apellido_alumno'].', '.$row['nombre_alumno'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['nombre_nivel_carrera'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['nombre_carrera'].'</l2></td>';
		echo '<td align="center"><a href="verAlumno.php?idAlumno='.$row['id_alumno'].'"><input type="image" src="ver.png" width="50" height="50" value="Opciones" /></a></td>';
		echo '<td align="center"><a href="listadoSeguimiento.php?idAlumno='.$row['id_alumno'].'"><input type="image" src="seguimiento.png" width="60" height="40" value="Opciones" /></a></td>';
	echo '</tr>';
}
echo '</table>';
?>
<p>
<center><a href="imprimirListadoGraduados.php?control=0"><input type="button" value="Imprimir"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="excelListadoGraduados.php?control=0"><input type="button" value="Excel"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="buscador.php"><input type="button" value="Atr&aacute;s"></center></a>
</p>
</body>
</html>