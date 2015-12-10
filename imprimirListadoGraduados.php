<?php
/*
header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=DatosFleteros.xls");
*/
?>
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
	l3 {font-family: Cambria;color: #424242; padding: .12em;}
</style>
</head>
<body link="#000000" vlink="#000000" alink="#FFFFFF" onload="print()">
<?php
include_once "conexion.php";

//$sqlBuscar = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno, numerodni_alumno,carrera.nombre_carrera,nombre_nivel_carrera,provincia_viviendo_alumno,localidad_viviendo_alumno,calle_alumno,numerocalle_alumno,mail_alumno FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
$sql = "SELECT id_alumno,nombre_alumno,apellido_alumno,foto_alumno,carrera.nombre_carrera,nivel_carrera.nombre_nivel_carrera,numerodni_alumno,mail_alumno,mail_alumno2 FROM alumno INNER JOIN carrera ON carrera.id_carrera = alumno.carrera_alumno INNER JOIN nivel_carrera ON carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera ";
$orden = " ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC;";

$sqlBuscar = pg_query($sql.$orden);
$contador = 0;
echo '<table align="center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="7" align="center"><l1>Listado de Graduados</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000">';
		echo '<td align="center"><strong><label>&nbsp;</label></strong></td>';
		echo '<td align="center"><label>Foto</label></td>';
		echo '<td align="center"><label>Alumno</label></td>';
		echo '<td align="center"><label>Nivel Carrera</label></td>';
		echo '<td align="center"><label>Carrera</label></td>';
		echo '<td align="center"><label>Mail</label></td>';
		echo '<td align="center"><label>Telefono</label></td>';
	echo '</tr>';

while($row=pg_fetch_array($sqlBuscar,NULL,PGSQL_ASSOC)){
	$mail_alumno1 = $row['mail_alumno'];
	$mail_alumno2 = $row['mail_alumno2'];
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
		if ($mail_alumno == NULL){
			echo '<td align="center"><l3>'.$mail_alumno1.'</l3></td>';
		}else{
			echo '<td align="center"><l3>'.$mail_alumno2.'</l3></td>';
		}
		
		//Buscar telefonos del graduado
		$telefonoAlumno = "";
		$idAlumnoTel = $row['id_alumno'];
		
		$sqlTelefonos = pg_query("SELECT caracteristica_alumno,telefono_alumno FROM telefonos_del_alumno WHERE alumno_fk=$idAlumnoTel");
		while($rowTelefonos = pg_fetch_array($sqlTelefonos)){
			$telefonoAlumno = $telefonoAlumno.$rowTelefonos['caracteristica_alumno'].' - '.$rowTelefonos['telefono_alumno'].' / ';
		}
		
		echo '<td align="center"><l2>'.$telefonoAlumno.'</l2></td>';
	echo '</tr>';	
}
echo '</table>';
?>

</body>
</html>