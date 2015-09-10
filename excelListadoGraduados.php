<?php

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=ExcelAlumnos.xls");

?>
<html>
<head>
<title> Listado Graduados </title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style type="text/css">
	label {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
	#tabla {background: #F2F2F2;}
	#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1em;}
	l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;font-size: 0.7em}
</style>
</head>
<body link="#000000" vlink="#000000" alink="#FFFFFF" onload=print()>
<?php
include_once 'conexion.php';
$control = $_REQUEST['control'];
if($control == 1){
	$palabra = $_REQUEST['palabra'];
	if ($palabra == "grado" || $palabra == "Grado"){
		$sqlBuscar = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno, numerodni_alumno,nombre_nivel_carrera,carrera.nombre_carrera,id_nivel_carrera,provincia_viviendo_alumno,localidad_viviendo_alumno,calle_alumno,numerocalle_alumno,mail_alumno FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) WHERE carrera_alumno = id_carrera AND 
		   UPPER(nombre_alumno)        LIKE UPPER('%{$_REQUEST['palabra']}%')
		or UPPER(apellido_alumno)	   LIKE UPPER('%{$_REQUEST['palabra']}%')
		or UPPER(nombre_carrera)	   LIKE UPPER('%{$_REQUEST['palabra']}%')
		or UPPER(nombre_nivel_carrera) LIKE UPPER('{$_REQUEST['palabra']}')
		or UPPER(numerodni_alumno)	   LIKE UPPER('%{$_REQUEST['palabra']}%') ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
		}else{
		$sqlBuscar = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno, numerodni_alumno,nombre_nivel_carrera,carrera.nombre_carrera,id_nivel_carrera,provincia_viviendo_alumno,localidad_viviendo_alumno,calle_alumno,numerocalle_alumno,mail_alumno FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) WHERE carrera_alumno = id_carrera AND 
		   UPPER(nombre_alumno)        LIKE UPPER('%{$_REQUEST['palabra']}%')
		or UPPER(apellido_alumno)	   LIKE UPPER('%{$_REQUEST['palabra']}%')
		or UPPER(nombre_carrera)	   LIKE UPPER('%{$_REQUEST['palabra']}%')
		or UPPER(nombre_nivel_carrera) LIKE UPPER('%{$_REQUEST['palabra']}%')
		or UPPER(numerodni_alumno)	   LIKE UPPER('%{$_REQUEST['palabra']}%') ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
		}
}else{
	$sqlBuscar = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,carrera.nombre_carrera,numerodni_alumno,nombre_nivel_carrera,provincia_viviendo_alumno,localidad_viviendo_alumno,calle_alumno,numerocalle_alumno,mail_alumno FROM alumno INNER JOIN carrera on(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) WHERE carrera_alumno = id_carrera  ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
}
echo '<table align="center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="8" align="center"><l1>Listado de Graduados</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#FFFFFD">';
		echo '<td align="center"><label>Alumno</label></td>';
		echo '<td align="center"><label>DNI</label></td>';
		echo '<td align="center"><label>Nivel Carrera</label></td>';
		echo '<td align="center"><label>Carrera</label></td>';
		echo '<td align="center"><label>Mail</label></td>';
		echo '<td align="center"><label>Telefono</label></td>';
		echo '<td align="center"><label>Direcci&oacute;n</label></td>';
		echo '<td align="center"><label>Localidad</label></td>';
		echo '<td align="center"><label>Provincia</label></td>';
	echo '</tr>';
while($row=pg_fetch_array($sqlBuscar,NULL,PGSQL_ASSOC)){
	echo '<tr>';
		echo '<td align="center"><l2>'.ucwords($row['apellido_alumno']).', '.ucwords($row['nombre_alumno']).'</l2></td>';
		echo '<td align="center"><l2>'.$row['numerodni_alumno'].'</l2></td>';
		echo '<td align="center"><l2>'.ucwords($row['nombre_nivel_carrera']).'</l2></td>';
		echo '<td align="center"><l2>'.ucwords($row['nombre_carrera']).'</l2></td>';
		echo '<td align="center"><l2>'.$row['mail_alumno'].'</l2></td>';
		//Buscar telefonos del graduado
		$telefonoAlumno = "";
		$idAlumnoTel = $row['id_alumno'];
		
		$sqlTelefonos = pg_query("SELECT caracteristica_alumno,telefono_alumno FROM telefonos_del_alumno WHERE alumno_fk=$idAlumnoTel");
		while($rowTelefonos = pg_fetch_array($sqlTelefonos)){
			$telefonoAlumno = $telefonoAlumno.$rowTelefonos['caracteristica_alumno'].' - '.$rowTelefonos['telefono_alumno'].' / ';
		}
		
		echo '<td align="center"><l2>'.$telefonoAlumno.'</l2></td>';
		echo '<td align="center"><l2>'.$row['calle_alumno'].' '.$row['numerocalle_alumno'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['localidad_viviendo_alumno'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['provincia_viviendo_alumno'].'</l2></td>';
	echo '</tr>';
	
	
}
echo '</table>';
?>

</body>
</html>