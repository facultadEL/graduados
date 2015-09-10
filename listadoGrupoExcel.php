<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<basefont color="#424242" size="4" face="Cambria">
<?php

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=IntegrantesGrupo.xls");

include_once 'conexion.php';
$contador = 0;
$id_Grupo = $_REQUEST['idGrupo'];
$datosGrupo = pg_query("SELECT * FROM grupo_alumnos WHERE id_grupo_alumnos = '$id_Grupo'");
$row=pg_fetch_array($datosGrupo,NULL,PGSQL_ASSOC);
	$nombre_grupo = $row['nombre_grupo'];
	$descripcion_grupo = $row['descripcion_grupo'];
$grupo = pg_query("SELECT nombre_alumno,apellido_alumno, foto_alumno,carrera_alumno,id_alumnos_por_grupo,grupo_fk,alumno_fk,id_grupo_alumnos,nombre_grupo,descripcion_grupo,id_carrera,nombre_carrera,nombre_nivel_carrera FROM alumnos_por_grupo INNER JOIN grupo_alumnos ON(grupo_alumnos.id_grupo_alumnos = alumnos_por_grupo.grupo_fk) INNER JOIN alumno ON(alumno.id_alumno = alumnos_por_grupo.alumno_fk) INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN nivel_carrera ON(carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera) WHERE id_grupo_alumnos = '$id_Grupo' ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC");
echo '<table align="center" border="1">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td colspan="4" align="center"><FONT size="5" color="#0B615E"><b>Integrantes</b></FONT></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td align="center" bgcolor="#000000">&nbsp;</td>';
		echo '<td align="center" bgcolor="#000000"><FONT size="4" color="#0080FF" face="Cambria">Graduado</FONT></td>';
		echo '<td align="center" bgcolor="#000000"><FONT size="4" color="#0080FF" face="Cambria">Nivel Carrera</FONT></td>';
		echo '<td align="center" bgcolor="#000000"><FONT size="4" color="#0080FF" face="Cambria">Carrera</FONT></td>';
	echo '</tr>';
while($row=pg_fetch_array($grupo,NULL,PGSQL_ASSOC)){
	$id_Alumno = $row['alumno_fk'];
	$nombre_alumno = $row['nombre_alumno'];
	$apellido_alumno = $row['apellido_alumno'];
	$nombre_carrera = $row['nombre_carrera'];
	$nivel_carrera = $row['nombre_nivel_carrera'];
	$contador = $contador + 1;
	echo '<tr>';
	if ($contador%2 == 0){
		echo '<td align="center" bgcolor="#F2F2F2"><l2>'.$contador.'</l2></td>';
		echo '<td align="left" bgcolor="#F2F2F2"><l2>'.$apellido_alumno.', '.$nombre_alumno.'</l2></td>';
		echo '<td align="center" bgcolor="#F2F2F2"><l2>'.$nivel_carrera.'</l2></td>';
		echo '<td align="center" bgcolor="#F2F2F2"><l2>'.$nombre_carrera.'</l2></td>';
	}else{
		echo '<td align="center"><l2>'.$contador.'</l2></td>';
		echo '<td align="left""><l2>'.$apellido_alumno.', '.$nombre_alumno.'</l2></td>';
		echo '<td align="center""><l2>'.$nivel_carrera.'</l2></td>';
		echo '<td align="center"><l2>'.$nombre_carrera.'</l2></td>';
	}
	echo '</tr>';
	}
echo '</table>';
?>