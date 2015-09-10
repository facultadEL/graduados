<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Graduado</title>
	<style type="text/css">
		{font-family: Cambria }
			#tabla {background: #F2F2F2;}
			#tabla1 {background: #F2F2F2; align: center}
			label {width: 13em;float: left;font-family: Cambria;text-decoration: underline; text-transform: capitalize; color: #0B3861;font-weight:bold; padding-left: .5em;}
			l1 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
			l2 {font-family: Cambria;color: #424242; padding: .12em;}
			l3 {font-family: Cambria;color: #424242; text-transform: capitalize; width: 13em;}
			l4 {font-family: Cambria;color: #0040FF; text-transform: capitalize; font-size: 1.5em;}
			a { text-decoration:none }
    </style>

		<script>
			$(document).ready(function(){
			
			
			$('form').validate();
			$("#commentForm").validate();
			
		});
		
		
		
		</script>
		
</head>

<body>
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

$cadena= 'Desea eliminar el graduado seleccionado?';
	$utf= utf8_decode($cadena);
$esp = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; ';

?>
<script type="text/javascript">
		function confirmation() {
			var pregunta = confirm("<?php echo $utf= utf8_decode($cadena); ?>")
			if (pregunta){
				window.location = "eliminarAlumno.php?idAlumno=<?php echo $id_Alumno?>";
			}else{
				window.location = "listadoAlumno.php";
			}
		}
		</script>
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Foto</FONT></legend>
<table align="center">
	<tr>
		<td>
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
</table>
</fieldset>
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Graduado</FONT></legend>
<form class="formVerGraduado" id="commentForm" method="post" >
<table cellpadding="2" cellspacing="1">
	<tr>
		<td>
			<label for="cNombre">Nombre: </label>
			<l1><?php echo $nombre_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td>
		<label for="cApellido">Apellido: </label>
		<l1><?php echo $apellido_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td>
		<label for="cTipoDNI">Tipo DNI: </label>
			
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
		<td>
		<label for="cNumeroDNI">N&uacute;mero DNI: </label>
		<l1><?php echo $numerodni_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td>
		<label for="cCarrera">Carrera: </label>
				<?php
					include_once "conexion.php";
					$consultaCarrera=pg_query("select * FROM carrera");
					while($rowCarrera=pg_fetch_array($consultaCarrera)){
					$id = $rowCarrera['id_carrera'];
					if($id == $carrera_alumno){						
						echo '<l1>'.$rowCarrera['nombre_carrera'].'</l1>';
					}
				}
				?>
		</td>
	</tr>
	<tr>
		<td>
		<label for="cTelefono">Tel&eacute;fonos: </label>
		<?php				
			$telefonosAlumno = pg_query("SELECT * FROM telefonos_del_alumno WHERE alumno_fk = $id_Alumno");
			while($rowTA=pg_fetch_array($telefonosAlumno,NULL,PGSQL_ASSOC)){				
				echo '<tr><td><l3>';
				echo $esp.$rowTA['duenio_del_telefono'].': '.$rowTA['caracteristica_alumno'].'-'.$rowTA['telefono_alumno'].'<br>';
				echo '</l3></td></tr>';}
		?>
		</td>
	</tr>
	<tr>
		<td>
		<label for="cFecha">Fecha de Nacimiento: </label>
		<l1><?php echo $fechanacimiento_alumno?></l1>
		</td>
	</tr>	
	<tr>
		<td>
			<label for="cProvinciaNacimiento">Provincia Nacimiento: </label>
			<l1><?php echo $provincia_nac_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cLocalidadNacimiento">Localidad Nacimiento: </label>
			<l1><?php echo $localidad_nac_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cProvinciaTrabajo">Provincia Trabajo: </label>
			<l1><?php echo $provincia_trabajo_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cLocalidadTrabajo">Localidad Trabajo: </label>
			<l1><?php echo $localidad_trabajo_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cProvinciaViviendo">Provincia Viviendo: </label>
			<l1><?php echo $provincia_viviendo_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cLocalidadViviendo">Localidad Viviendo: </label>
			<l1><?php echo $localidad_viviendo_alumno; ?></l1>
		</td>
	</tr>		
	<tr>
		<td>
		<label for="cCalle">Calle: </label>
		<l1><?php echo $calle_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td>
		<label for="cNumCalle">N&uacute;mero: </label>
		<l1><?php echo $numerocalle_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cMail">Mail 1: </label>
			<l2><?php echo $mail_alumno?></l2>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cMail">Mail 2: </label>
			<l2><?php echo $mail_alumno2?></l2>
		</td>
	</tr>
	<tr>
		<td>
		<label for="cFacebook">Facebook: </label>
		<l1><?php echo $facebook_alumno?></l1>
		</td>
	</tr>
	<tr>
		<td>
			<label for="cFacebook">Twitter: </label>
			<l1><?php echo $twitter_alumno; ?></l1>
		</td>
	</tr>
	<tr>
		<td>
		<label for="cPerfilAcademico">Perfil Acad&eacute;mico: </label>
		<l1><?php echo $perfilacademico_alumno?></l1>
		</td>
	<tr>
	<tr>
		<td>
			<label for="cPerfilLaboral">Perfil Laboral: </label>
			<l1><?php echo $perfil_laboral_alumno; ?></l1>
		</td>
	</tr>
</table>
<table align="center">
	<tr><td>&nbsp;</td></tr>
	</tr>
		<td>
			<center><a href="listadoSeguimiento.php?idAlumno=<?php echo $id_Alumno;?>"><l4>Ver Seguimiento</l4></a></center>
		</td>
	</tr>
</table>
</form>
	<table>
		<tr>
			<td>				
				<?php echo '<a href="registrarGraduado.php?idAlumno='.$id_Alumno.'"><input type="image" src="modificar.png" width="40" height="40" value="Opciones" /></a>';?>
			</td>
			<td>
				<?php echo '<input type="image" onclick="confirmation()" src="eliminar.png" width="40" height="40" value="Opciones" />';?>
			</td>
			<td>
				<?php echo '<a href="imprimirGraduado.php?idAlumno='.$id_Alumno.'"><input type="image" src="print.png" width="45" height="45" value="Imprimir" /></a>';?>
			</td>
		</tr>
	</table>
		<p>
			<a href="listadoAlumno.php"><input type="button" value="Atr&aacute;s"></a>
		</p>
</fieldset>
</body>
</html>