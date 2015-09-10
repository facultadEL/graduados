<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<basefont color="#424242" size="4" face="Cambria">
<?php

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=ListadoTelefonos.xls");

include_once 'conexion.php';
$contador = 0;
$alumno = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno FROM alumno ORDER BY nombre_alumno,apellido_alumno ASC");
echo '<table align="center" border="1">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td colspan="4" align="center"><FONT size="5" color="#0B615E"><b>Tel&eacute;fonos</b></FONT></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td align="center"><strong><label>&nbsp;</label></strong></td>';
		echo '<td align="center" bgcolor="#000000"><FONT size="4" color="#0080FF" face="Cambria">Graduado</FONT></td>';
		echo '<td align="center" bgcolor="#000000"><FONT size="4" color="#0080FF" face="Cambria">Tel&eacute;fonos</FONT></td>';
		echo '<td align="center" bgcolor="#000000"><FONT size="4" color="#0080FF" face="Cambria">Due&ntilde;o/a</FONT></td>';
	echo '</tr>';
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
			echo '<td align="left" bgcolor="#F2F2F2">'.$nombre_alumno[$j].'</td>';
			echo '<td align="center" bgcolor="#F2F2F2">'.$telefono_alumno.'</td>';
			echo '<td align="center" bgcolor="#F2F2F2">'.$duenio_del_telefono.'</td>';
		}else{
			echo '<td align="center">&nbsp;</td>';
			echo '<td align="center">&nbsp;</td>';
			echo '<td align="center">'.$telefono_alumno.'</td>';
			echo '<td align="center">'.$duenio_del_telefono.'</td>';
		}
		$j++;
	echo '</tr>';
	}
	$i++;
	$j = $i;
}
echo '</table>';
?>