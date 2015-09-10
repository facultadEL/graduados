<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Graduado</title>
	<style type="text/css">
			label {float: left;font-family: Cambria;text-decoration: underline; text-transform: capitalize; color: #0B3861;font-weight:bold; font-size: 1em;}
			l1 {font-family: Cambria;color: #424242; text-transform: capitalize; font-size: 1.2em;}
			l2 {font-family: Cambria;color: #424242; padding: .12em; font-size: 1.2em;}
			l3 {font-family: Cambria;color: #424242; text-transform: capitalize; width: 13em; font-size: 1.2em;}
			div {font-family: Cambria;color: #424242; font-size: 2em; border-bottom: 1px solid #000000;}
    </style>		
</head>
<body onload=print()>
<?php
include_once "conexion.php";
$id_Alumno = $_REQUEST['idAlumno'];
	$alumnos = pg_query("SELECT * FROM alumno FULL OUTER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) FULL OUTER JOIN tipo_dni ON(tipo_dni.id_tipo_dni = alumno.tipodni_alumno) WHERE $id_Alumno = id_alumno AND carrera_alumno = id_carrera");
	$row=pg_fetch_array($alumnos,NULL,PGSQL_ASSOC);
	$nombre_alumno = $row['nombre_alumno'];
	$apellido_alumno = $row['apellido_alumno'];
	$tipodni_alumno = $row['tipodni_alumno'];
	$numerodni_alumno = $row['numerodni_alumno'];
	$carrera_alumno = $row['carrera_alumno'];
	$fechaNac_alumno = $row['fechanacimiento_alumno'];
	$provincia_nac_alumno = $row['provincia_nac_alumno'];
	$localidad_nac_alumno = $row['localidad_nac_alumno'];
	$provincia_trabajo_alumno = $row['provincia_trabajo_alumno'];
	$localidad_trabajo_alumno = $row['localidad_trabajo_alumno'];
	$provincia_viviendo_alumno = $row['provincia_viviendo_alumno'];
	$localidad_viviendo_alumno = $row['localidad_viviendo_alumno'];
	$calle_alumno = $row['calle_alumno'];
	$numerocalle_alumno = $row['numerocalle_alumno'];
	$mail_alumno = $row['mail_alumno'];
	$mail_alumno2 = $row['mail_alumno2'];
	$facebook_alumno = $row['facebook_alumno'];
	$twitter_alumno = $row['twitter_alumno'];
	$perfilacademico_alumno = $row['perfilacademico_alumno'];
	$perfil_laboral_alumno = $row['perfil_laboral_alumno'];
	$ancho_final = $row['ancho_final'];
	$alto_final = $row['alto_final'];
	$foto_alumno = $row['foto_alumno'];
	
	$sep = '-';
	$fecha_nacimiento_alumno = $fechaNac_alumno;
	$mostrar = explode($sep,$fecha_nacimiento_alumno);
		$dia = $mostrar[0];
		$mes = $mostrar[1];
		$anio = $mostrar[2];		
	$fechanacimiento_alumno = $dia.'-'.$mes.'-'.$anio;	
$esp = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; ';
$esp1 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
?>
<div><center>Planilla del Graduado</center></div>
<table width="100%" height="90%">
	<tr>
		<td width="30%">
			<label for="cNombre">Nombre: </label>
		</td>
		<td width="40%">
			<l1><?php echo $nombre_alumno?></l1>
		</td>
		<td valign="top" rowspan="7" width="30%">
			<?php
			if($ancho_final>$alto_final){
			//foto horizontal
			$ancho_mostrar=200;
			$alto_mostrar=$alto_final*$ancho_mostrar/$ancho_final;
			echo '<img src='.$foto_alumno.' width="'.$ancho_mostrar.'" height="'.$alto_mostrar.'">';
			}else{
			//fotos verticales
			$alto_mostrar=200;
			$ancho_mostrar=$ancho_final*$alto_mostrar/$alto_final;
			echo '<img src='.$foto_alumno.' width="'.$ancho_mostrar.'" height="'.$alto_mostrar.'">';
			}
			?>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cApellido">Apellido: </label>
		</td>
		<td width="40%">
			<l1><?php echo $apellido_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cTipoDNI">Tipo DNI: </label>
		</td>
		<td width="40%">
			<?php
				include_once "conexion.php";
				$consultaTipoDNI=pg_query("select * FROM tipo_dni");
				while($rowTipoDNI=pg_fetch_array($consultaTipoDNI)){
					$id = $rowTipoDNI['id_tipo_dni'];
					if ($id == $tipodni_alumno){
						//$id = '"'.$id.'"';
						echo '<l1>'.$rowTipoDNI['nombre_tipo_dni'].'</l1>';
					}
				}
			?>			
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cNumeroDNI">N&uacute;mero DNI: </label>
		</td>
		<td width="40%">
			<l1><?php echo $numerodni_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cCarrera">Carrera: </label>
		</td>
		<td width="40%">
			<?php
				include_once "conexion.php";
				$consultaCarrera=pg_query("select * FROM carrera");
				while($rowCarrera=pg_fetch_array($consultaCarrera)){
				$id = $rowCarrera['id_carrera'];
				if($id == $carrera_alumno){						
					echo '<l1>'.$rowCarrera['nombre_carrera'].$esp1.'</l1>';
				}
			}
			?>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cTelefono">Tel&eacute;fonos: </label>
		</td>
		<td colspan="2">
			<?php				
				$telefonosAlumno = pg_query("SELECT * FROM telefonos_del_alumno WHERE alumno_fk = $id_Alumno");
				while($rowTA=pg_fetch_array($telefonosAlumno,NULL,PGSQL_ASSOC)){
					echo '<tr><td colspan="3" width="70%"><l3>';
					echo $esp.$rowTA['duenio_del_telefono'].': '.$rowTA['caracteristica_alumno'].'-'.$rowTA['telefono_alumno'].'<br>';
					echo '</l3></td></tr>';}
			?>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cFecha">Fecha de Nacimiento: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $fechanacimiento_alumno?></l1>
		</td>
	</tr>	
	<tr>
		<td width="30%">
			<label for="cProvinciaNacimiento">Provincia Nacimiento: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $provincia_nac_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cLocalidadNacimiento">Localidad Nacimiento: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $localidad_nac_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cProvinciaTrabajo">Provincia Trabajo: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $provincia_trabajo_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cLocalidadTrabajo">Localidad Trabajo: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $localidad_trabajo_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cProvinciaViviendo">Provincia Viviendo: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $provincia_viviendo_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cLocalidadViviendo">Localidad Viviendo: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $localidad_viviendo_alumno; ?></l1>
		</td>
	</tr>		
	<tr>
		<td width="30%">
			<label for="cCalle">Calle: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $calle_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cNumCalle">N&uacute;mero: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $numerocalle_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cMail">Mail 1: </label>
		</td>
		<td colspan="2" width="70%">
			<l2><?php echo $mail_alumno?></l2>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cMail">Mail 2: </label>
		</td>
		<td colspan="2" width="70%">
			<l2><?php echo $mail_alumno2?></l2>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cFacebook">Facebook: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $facebook_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cFacebook">Twitter: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $twitter_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cPerfilAcademico">Perfil Acad&eacute;mico: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $perfilacademico_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td width="30%">
			<label for="cPerfilLaboral">Perfil Laboral: </label>
		</td>
		<td colspan="2" width="70%">
			<l1><?php echo $perfil_laboral_alumno; ?></l1>
		</td>
	</tr>
</table>
</body>
</html>