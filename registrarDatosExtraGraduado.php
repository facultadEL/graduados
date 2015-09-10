<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Registro de Graduado</title>
	<style type="text/css">
		{font-family: Cambria }			
			#contenedor {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			label {width: 10em;color: #336699; float: left; font-family: Cambria; padding-left: .3em;}
			label.error {font-family: Cambria;float: none;vertical-align: top;color: red;padding-left: .5em;}
			l1 {font-family: Cambria;color: #424242; text-transform: capitalize;}
			l3 {font-family: Cambria;color: #424242; text-transform: capitalize;width: 10em;}
			l2 {font-family: Cambria;color: #424242;}
    </style>
	<script>
		$(document).ready(function(){
		
		$.validator.addClassRules("rango", {range:[0,6]});
		$.validator.addClassRules("min", {minlength: 8});
		$.validator.addClassRules("minimo", {minlength: 2});
		$.validator.addClassRules("numCuil", {minlength: 7});
		$.validator.addClassRules("digitoCuil", {minlength: 1});
		$.validator.addClassRules("anio", {minlength: 4});
		$.validator.addClassRules("caracteristica", {minlength: 3});
		$.validator.addClassRules("telFijo", {minlength: 6});
		
		$('form').validate();
		$("#form1").validate();
		$("#form2").validate();
		
		
	});
	
	function evaluaring(academico){
		document.f1.submit(); 
	}
	</script>
	
<?php
include_once "conexion.php";

$control = $_REQUEST['control'];
$esp = '&nbsp;&nbsp;';
	
if($control == 0){

	$id_Alumno = $_REQUEST['idAlumno'];
	if ($id_Alumno == NULL){

		$nombre_alumno = ucwords($_REQUEST['nombreAlumno']);
		$apellido_alumno = ucwords($_REQUEST['apellidoAlumno']);
		$tipodni_alumno = $_REQUEST['tipoDNIAlumno'];
		$numerodni_alumno = $_REQUEST['dniAlumno'];
		$carrera_alumno = $_REQUEST['carreraAlumno'];
		$fechanacimiento_alumno = $_REQUEST['fecha_nacimiento_alumno'];
		$provincia_nac_alumno = ucwords($_REQUEST['provincia_nac_alumno']);
		$localidad_nac_alumno = ucwords($_REQUEST['localidad_nac_alumno']);
		$provincia_trabajo_alumno = ucwords($_REQUEST['provincia_trabajo_alumno']);
		$localidad_trabajo_alumno = ucwords($_REQUEST['localidad_trabajo_alumno']);
		$provincia_viviendo_alumno = ucwords($_REQUEST['provincia_viviendo_alumno']);
		$localidad_viviendo_alumno = ucwords($_REQUEST['localidad_viviendo_alumno']);
		$calle_alumno = ucwords($_REQUEST['calleAlumno']);
		$numerocalle_alumno = $_REQUEST['numeroCalleAlumno'];
		$mail_alumno = $_REQUEST['mailAlumno'];
		$mail_alumno2 = $_REQUEST['mail_alumno2'];
		$facebook_alumno = $_REQUEST['facebookAlumno'];
		$twitter_alumno = $_REQUEST['twitter_alumno'];
		$perfilacademico_alumno = ucfirst($_REQUEST['perfilAcademicoAlumno']);
		$perfil_laboral_alumno = ucfirst($_REQUEST['perfil_laboral_alumno']);
		$grupo_alumno = $_REQUEST['grupoAlumno'];
		
		$sep = '/-/';
		$datosPasar = $nombre_alumno.$sep.$apellido_alumno.$sep.$tipodni_alumno.$sep.$numerodni_alumno.$sep.$carrera_alumno.$sep.$fechanacimiento_alumno.$sep.$calle_alumno.$sep.$numerocalle_alumno.$sep.$mail_alumno.$sep.$facebook_alumno.$sep.$perfilacademico_alumno.$sep.$ancho_final.$sep.$alto_final.$sep.$destinoImagen.$sep.$mail_alumno2.$esp.$provincia_nac_alumno.$esp.$localidad_nac_alumno.$esp.$provincia_trabajo_alumno.$esp.$localidad_trabajo_alumno.$esp.$provincia_viviendo_alumno.$esp.$localidad_viviendo_alumno.$esp.$perfil_laboral_alumno.$esp.$twitter_alumno.$esp.$grupo_alumno;

		//$nombre_foto = $_FILES['fotoAlumno']['name'];
		$nombreFoto = $_FILES['fotoAlumno']['name'];
		$tipo_archivo = $_FILES['fotoAlumno']['type'];	
		$tamano_archivo = $_FILES['fotoAlumno']['size'];
		$archivo_foto = $_FILES['fotoAlumno']['tmp_name'];
		
		//en el siguiente paso le quito los espacios al nombre de la foto para evitar problemas.
		$nombre_foto = str_replace(" ", "-", $nombreFoto);

		$ftp_server = "190.114.198.126";
		$ftp_user_name = "fernandoserassioextension";
		$ftp_user_pass = "fernando2013";
		$destino_Imagen = "web/graduados/fotos/".$nombre_foto;
		$destinoImagen = "fotos/".$nombre_foto;
				
		//conexión
		$conn_id = ftp_connect($ftp_server); 
		// logeo
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

		$imagen = explode(".", $nombre_foto);
		$totalImagen=count($imagen);
		$formato = $totalImagen - 1;
		if ($nombre_foto != ""){
			if ($imagen[$formato] == "jpeg" || $imagen[$formato] == "jpg" || $imagen[$formato] == "png") {
			// archivo a copiar/subir
				$upload = ftp_put($conn_id, $destino_Imagen, $archivo_foto, FTP_BINARY);
			}else{
				echo '<script type="text/javascript">alert("El archivo subido no es válido. Suba algunos de estos formatos: - jpg - jpeg - png");
													window.location="registrarGraduado.php?volver=1&verDatos='.$datosPasar.'";	
					  </script>';
			}
		}else{
			$destinoImagen = NULL;
		}
		// cerramos
		ftp_close($conn_id);
		
		if ($imagen[$formato] == "jpeg" || $imagen[$formato] == "jpg"){

		$imagen_origen = imagecreatefromjpeg($destinoImagen);
		//obtengo el ancho de la imagen original
		$ancho_origen = imagesx($imagen_origen);
		//obtengo el alto de la imagen original
		$alto_origen = imagesy($imagen_origen);
		
		$ancho=600;
		$alto=400;
		
		if($ancho_origen>$alto_origen){
		//foto horizontal
			$ancho_final=$ancho;
			$alto_final=$alto_origen*$ancho_final/$ancho_origen;    
		}else{
		//fotos verticales
			$alto_final=$alto;
			$ancho_final=$ancho_origen*$alto_final/$alto_origen;
		}
		// creo la imagen con el tamaño que le pase
		$imagen_destino = imagecreatetruecolor($ancho_final ,$alto_final );

		imagecopyresized( $imagen_destino, $imagen_origen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_origen, $alto_origen);
		
		//guardo la nueva foto (nuevaFoto, destino, calidad)
		imagejpeg( $imagen_destino,$destinoImagen,100 );
		}
		
		if ($imagen[$formato] == "png") {
			
		$imagen_origen = imagecreatefrompng($destinoImagen);
		//obtengo el ancho de la imagen original
		$ancho_origen = imagesx($imagen_origen);
		//obtengo el alto de la imagen original
		$alto_origen = imagesy($imagen_origen);
		
		$ancho=600;
		$alto=400;
		
		if($ancho_origen>$alto_origen){
		//foto horizontal
			$ancho_final=$ancho;
			$alto_final=$alto_origen*$ancho_final/$ancho_origen;    
		}else{
		//fotos verticales
			$alto_final=$alto;
			$ancho_final=$ancho_origen*$alto_final/$alto_origen;
		}
		// creo la imagen con el tamaño que le pase
		$imagen_destino = imagecreatetruecolor($ancho_final ,$alto_final );
		
		//Copio y cambio el tamaño de la imagen
		imagecopyresized( $imagen_destino, $imagen_origen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_origen, $alto_origen);
		
		//guardo la nueva foto (nuevaFoto, destino, calidad)
		imagepng( $imagen_destino,$destinoImagen,9 );
		}
		$consultaMax = pg_query("SELECT max(id_alumno) FROM alumno");
		$rowMax = pg_fetch_array($consultaMax);
		$maximoAlumno = $rowMax['max'];
		$maximoAlumno = $maximoAlumno + 1;
		$id_Alumno = $maximoAlumno;


		$newAlumno="INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,tipodni_alumno,numerodni_alumno,carrera_alumno,fechanacimiento_alumno,provincia_nac_alumno,localidad_nac_alumno,provincia_trabajo_alumno,localidad_trabajo_alumno,provincia_viviendo_alumno,localidad_viviendo_alumno,calle_alumno,numerocalle_alumno,mail_alumno,facebook_alumno,foto_alumno,perfilacademico_alumno, ancho_final, alto_final, mail_alumno2, perfil_laboral_alumno, twitter_alumno)VALUES('$id_Alumno','$nombre_alumno','$apellido_alumno','$tipodni_alumno','$numerodni_alumno','$carrera_alumno','$fechanacimiento_alumno','$provincia_nac_alumno','$localidad_nac_alumno','$provincia_trabajo_alumno','$localidad_trabajo_alumno','$provincia_viviendo_alumno','$localidad_viviendo_alumno','$calle_alumno','$numerocalle_alumno','$mail_alumno','$facebook_alumno','$destinoImagen','$perfilacademico_alumno','$ancho_final','$alto_final', '$mail_alumno2','$perfil_laboral_alumno','$twitter_alumno');";
		$asignarGraduado = "INSERT INTO alumnos_por_grupo(grupo_fk, alumno_fk)VALUES('$grupo_alumno','$id_Alumno');";
		$consultas = $newAlumno.$asignarGraduado;
			$error=0;

			if (!pg_query($conn, $consultas)){
				$errorpg = pg_last_error($conn);
				$termino = "ROLLBACK";
				$error=1;
			}else{
				$termino = "COMMIT";
			}
		   	pg_query($termino);
				
		if ($error==1){
			echo '<script language="JavaScript"> 			alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador");</script>';
			echo $errorpg;
		}
	}else{
		//aca va el update
		
		$nombre_alumno = ucwords($_REQUEST['nombreAlumno']);
		$apellido_alumno = ucwords($_REQUEST['apellidoAlumno']);
		$tipodni_alumno = $_REQUEST['tipoDNIAlumno'];
		$numerodni_alumno = $_REQUEST['dniAlumno'];
		$carrera_alumno = $_REQUEST['carreraAlumno'];
		$fechanacimiento_alumno = $_REQUEST['fecha_nacimiento_alumno'];
		$provincia_nac_alumno = ucwords($_REQUEST['provincia_nac_alumno']);
		$localidad_nac_alumno = ucwords($_REQUEST['localidad_nac_alumno']);
		$provincia_trabajo_alumno = ucwords($_REQUEST['provincia_trabajo_alumno']);
		$localidad_trabajo_alumno = ucwords($_REQUEST['localidad_trabajo_alumno']);
		$provincia_viviendo_alumno = ucwords($_REQUEST['provincia_viviendo_alumno']);
		$localidad_viviendo_alumno = ucwords($_REQUEST['localidad_viviendo_alumno']);
		$calle_alumno = ucwords($_REQUEST['calleAlumno']);
		$numerocalle_alumno = $_REQUEST['numeroCalleAlumno'];
		$mail_alumno = $_REQUEST['mailAlumno'];
		$facebook_alumno = $_REQUEST['facebookAlumno'];
		$twitter_alumno = $_REQUEST['twitter_alumno'];
		$perfilacademico_alumno = ucfirst($_REQUEST['perfilAcademicoAlumno']);
		$perfil_laboral_alumno = ucfirst($_REQUEST['perfil_laboral_alumno']);
		$mail_alumno2 = $_REQUEST['mail_alumno2'];
		$grupo_alumno = $_REQUEST['grupoAlumno'];

		$nombre_alumno = ucwords($_REQUEST['nombreAlumno']);

		
		$nombreFoto = $_FILES['fotoAlumno']['name'];
		$tipo_archivo = $_FILES['fotoAlumno']['type'];	
		$tamano_archivo = $_FILES['fotoAlumno']['size'];
		$archivo_foto = $_FILES['fotoAlumno']['tmp_name'];
		
		//en el siguiente paso le quito los espacios al nombre de la foto para evitar problemas.
		$nombre_foto = str_replace(" ", "-", $nombreFoto);
		
		
		if($nombre_foto == NULL){
			$sqlFoto = pg_query("SELECT * FROM alumno WHERE id_alumno = $id_Alumno");
			$rowFoto = pg_fetch_array($sqlFoto);
			
			$destinoImagen = $rowFoto['foto_alumno'];
			$ancho_final = $rowFoto['ancho_final'];
			$alto_final = $rowFoto['alto_final'];
			
			
			
		}else{
			
			$ftp_server = "190.114.198.126";
			$ftp_user_name = "fernandoserassioextension";
			$ftp_user_pass = "fernando2013";
			$destino_Imagen = "web/graduados/fotos/".$nombre_foto;
			$destinoImagen = "fotos/".$nombre_foto;
					
			//conexión
			$conn_id = ftp_connect($ftp_server); 
			// logeo
			$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

			$imagen = explode(".", $nombre_foto);
			$totalImagen=count($imagen);
			$formato = $totalImagen - 1;
			
				if ($imagen[$formato] == "jpeg" || $imagen[$formato] == "jpg" || $imagen[$formato] == "png") {
				// archivo a copiar/subir
					$upload = ftp_put($conn_id, $destino_Imagen, $archivo_foto, FTP_BINARY);
				}else{
					echo '<script type="text/javascript">alert("El archivo subido no es válido. Suba algunos de estos formatos: - jpg - jpeg - png");
														window.location="registrarGraduado.php?volver=1&verDatos='.$datosPasar.'";	
						  </script>';
				}
			
			// cerramos
			ftp_close($conn_id);
			
			if ($imagen[$formato] == "jpeg" || $imagen[$formato] == "jpg"){

			$imagen_origen = imagecreatefromjpeg($destinoImagen);
			//obtengo el ancho de la imagen original
			$ancho_origen = imagesx($imagen_origen);
			//obtengo el alto de la imagen original
			$alto_origen = imagesy($imagen_origen);
			
			$ancho=600;
			$alto=400;
			
			if($ancho_origen>$alto_origen){
			//foto horizontal
				$ancho_final=$ancho;
				$alto_final=$alto_origen*$ancho_final/$ancho_origen;    
			}else{
			//fotos verticales
				$alto_final=$alto;
				$ancho_final=$ancho_origen*$alto_final/$alto_origen;
			}
			// creo la imagen con el tamaño que le pase
			$imagen_destino = imagecreatetruecolor($ancho_final ,$alto_final );

			imagecopyresized( $imagen_destino, $imagen_origen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_origen, $alto_origen);
			
			//guardo la nueva foto (nuevaFoto, destino, calidad)
			imagejpeg( $imagen_destino,$destinoImagen,100 );
			}
			
			if ($imagen[$formato] == "png") {
			$imagen_origen = imagecreatefrompng($destinoImagen);
			//obtengo el ancho de la imagen original
			$ancho_origen = imagesx($imagen_origen);
			//obtengo el alto de la imagen original
			$alto_origen = imagesy($imagen_origen);
			
			$ancho=600;
			$alto=400;
			
			if($ancho_origen>$alto_origen){
			//foto horizontal
				$ancho_final=$ancho;
				$alto_final=$alto_origen*$ancho_final/$ancho_origen;    
			}else{
			//fotos verticales
				$alto_final=$alto;
				$ancho_final=$ancho_origen*$alto_final/$alto_origen;
			}
			// creo la imagen con el tamaño que le pase
			$imagen_destino = imagecreatetruecolor($ancho_final ,$alto_final );
			
			//Copio y cambio el tamaño de la imagen
			imagecopyresized( $imagen_destino, $imagen_origen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_origen, $alto_origen);
			
			//guardo la nueva foto (nuevaFoto, destino, calidad)
			imagepng( $imagen_destino,$destinoImagen,9 );
			}
		
		}
		//update
		$modAlumno="UPDATE alumno SET nombre_alumno='$nombre_alumno', apellido_alumno='$apellido_alumno', tipodni_alumno='$tipodni_alumno', numerodni_alumno='$numerodni_alumno', carrera_alumno='$carrera_alumno', fechanacimiento_alumno='$fechanacimiento_alumno', provincia_nac_alumno='$provincia_nac_alumno', localidad_nac_alumno='$localidad_nac_alumno', provincia_trabajo_alumno='$provincia_trabajo_alumno', localidad_trabajo_alumno='$localidad_trabajo_alumno', provincia_viviendo_alumno='$provincia_viviendo_alumno', localidad_viviendo_alumno='$localidad_viviendo_alumno', calle_alumno='$calle_alumno', numerocalle_alumno='$numerocalle_alumno', mail_alumno='$mail_alumno', mail_alumno2='$mail_alumno2', facebook_alumno='$facebook_alumno', twitter_alumno='$twitter_alumno', foto_alumno='$destinoImagen', perfilacademico_alumno='$perfilacademico_alumno', perfil_laboral_alumno='$perfil_laboral_alumno', ancho_final='$ancho_final', alto_final='$alto_final' WHERE id_alumno = $id_Alumno;";

			$error=0;

			if (!pg_query($conn, $modAlumno)) 
			 {
			 $errorpg = pg_last_error($conn);
			 $termino = "ROLLBACK";
			 $error=1;
			 }
			 else
			 {
			 $termino = "COMMIT";
			 }
		   pg_query($termino);
				
		if ($error==1){
					echo '<script language="JavaScript"> 
					alert("Los datos no se modificaron correctamente. Pongase en contacto con el administrador");</script>';
				}
		
	}

	}else{
		$id_Alumno = $_REQUEST['idAlumno'];
		
		$sqlAlumno = pg_query("SELECT * FROM alumno WHERE id_alumno = $id_Alumno");
		$rowAlumno = pg_fetch_array($sqlAlumno);
			$nombre_alumno = ucwords($rowAlumno['nombre_alumno']);
			$apellido_alumno = ucwords($rowAlumno['apellido_alumno']);
			$tipodni_alumno = $rowAlumno['tipodni_alumno'];
			$numerodni_alumno = $rowAlumno['numerodni_alumno'];
			$carrera_alumno = $rowAlumno['carrera_alumno'];
			$fechanacimiento_alumno = $rowAlumno['fechanacimiento_alumno'];
			// $verFecha = explode('-',$fechaNacimiento);
			// 	$dia = $verFecha[0];
			// 	$mes = $verFecha[1];
			// 	$anio = $verFecha[2];
			// $fechanacimiento_alumno = $dia.'-'.$mes.'-'.$anio;
			$provincia_nac_alumno = ucwords($rowAlumno['provincia_nac_alumno']);
			$localidad_nac_alumno = ucwords($rowAlumno['localidad_nac_alumno']);
			$provincia_trabajo_alumno = ucwords($rowAlumno['provincia_trabajo_alumno']);
			$localidad_trabajo_alumno = ucwords($rowAlumno['localidad_trabajo_alumno']);
			$provincia_viviendo_alumno = ucwords($rowAlumno['provincia_viviendo_alumno']);
			$localidad_viviendo_alumno = ucwords($rowAlumno['localidad_viviendo_alumno']);
			$calle_alumno = ucwords($rowAlumno['calle_alumno']);
			$numerocalle_alumno = $rowAlumno['numerocalle_alumno'];
			$mail_alumno = $rowAlumno['mail_alumno'];
			$facebook_alumno = $rowAlumno['facebook_alumno'];
			$twitter_alumno = $rowAlumno['twitter_alumno'];
			$perfilacademico_alumno = ucfirst($rowAlumno['perfilacademico_alumno']);
			$perfil_laboral_alumno = ucfirst($rowAlumno['perfil_laboral_alumno']);
			$destinoImagen = $rowAlumno['foto_alumno'];
			$ancho_final = $rowAlumno['ancho_final'];
			$alto_final = $rowAlumno['alto_final'];
			$mail_alumno2 = $rowAlumno['mail_alumno2'];
	
	
		if($control == 1){
			$seGuardo = 0;
			$id_Alumno = $_REQUEST['idAlumno'];
			$caracteristica = $_REQUEST['caracteristica_alumno'];
			$telefono = $_REQUEST['telefono_alumno'];
			$duenio_del_telefono = ucwords($_REQUEST['duenio_del_telefono']);
			$sqlTelefonosAlumno = "";
				
			$consultaMax = pg_query("SELECT max(id_telefonos_del_alumno) FROM telefonos_del_alumno");
			$rowMax = pg_fetch_array($consultaMax);
			$maximoTelAlumno = $rowMax['max'];
			$idTelAlumno = $maximoTelAlumno+1;	
			$seEjecuta = 0;
			if ($caracteristica != NULL || $telefono != NULL || $duenio_del_telefono != NULL){
				$sqlTelefonosAlumno = "INSERT INTO telefonos_del_alumno(id_telefonos_del_alumno, caracteristica_alumno, telefono_alumno, alumno_fk, duenio_del_telefono) VALUES('$idTelAlumno','$caracteristica','$telefono','$id_Alumno', '$duenio_del_telefono');";
				$seEjecuta=1;
			}
			
			$error=0;
			if ($seEjecuta == 1){
				if(!pg_query($conn,$sqlTelefonosAlumno)){
					$errorpg = pg_last_error($conn);
					$termino = "ROLLBACK";
					$error=1;
				}else{
					$termino = "COMMIT";
					$seGuardo++;
				}
				pg_query($termino);
				if($error==1){
					echo '<script language="JavaScript"> 			alert("Los Telefonos no se guardaron correctamente. Pongase en contacto con el administrador");</script>';
					echo $errorpg;
				}
			}				
			
		}
	}
	
$cadena= 'Los datos se guardaron correctamente.';
$utf= utf8_decode($cadena);
//$cadena1= 'Por favor ingrese al menos un telefono.';
$cadena1= 'Por favor ingrese al menos un telefono.'.$id_Alumno;
$utf1= utf8_decode($cadena1);
?>
<script type="text/javascript">
	function confirmation() {
		var pregunta = alert("<?php echo $utf= utf8_decode($cadena); ?>")
		if (pregunta){
			window.location = "listadoAlumno.php";
		}else{
			window.location = "listadoAlumno.php";
		}
	}
	function faltaTel() {
		//alert("<?php echo $utf= utf8_decode($cadena); ?>");
		<?php echo 'alert("Por favor, ingrese al menos un telefono"); window.location="registrarDatosExtraGraduado.php?control=1&idAlumno='.$id_Alumno.'";'?>
	}

</script>
</head>
<body>
<div id="contenedor">
<!-- <form class="formNuevoGraduado" name="f1" id="form2" action="guardarGraduado.php" method="post" enctype="multipart/form-data"> -->
<fieldset>
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Foto</FONT></legend>
<table align="center" id="tabla" cellpadding="2" cellspacing="2" width="100%">
	<tr width="100%">
		<td align="center" width="100%">
			<?php
				$alto_destino = imagesy($imagen_destino);
				$ancho_destino = imagesx($imagen_destino);
				if($ancho_destino>$alto_destino){
					//foto horizontal
					$ancho_mostrar=200;
					$alto_mostrar=$alto_destino*$ancho_mostrar/$ancho_destino;  
					echo '<img src='.$destinoImagen.' width="'.$ancho_mostrar.'" height="'.$alto_mostrar.'">';
				}else{
					//fotos verticales
					$alto_mostrar=200;
					$ancho_mostrar=$ancho_destino*$alto_mostrar/$alto_destino;
					echo '<img src='.$destinoImagen.' width="'.$ancho_mostrar.'" height="'.$alto_mostrar.'">';
				}
			?>
		</td>
	</tr>
</table>
</fieldset>
<fieldset>
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Datos Graduado</FONT></legend>
<table align="center" id="tabla" cellpadding="2" cellspacing="2" width="100%">
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cNombre">Nombre: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $nombre_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cApellido">Apellido: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $apellido_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cTipoDNI">DNI y N&deg;: </label>
		</td>
		<td align="left" width="70%">
				<l1><?php
					include_once "conexion.php";
					$consulta=pg_query("SELECT * FROM tipo_dni");
					while($rowTipo=pg_fetch_array($consulta,NULL,PGSQL_ASSOC)){
                                $id = $rowTipo['id_tipo_dni'];
								if($id == $tipodni_alumno){
									echo $rowTipo['nombre_tipo_dni']; 
								}
                            }
				?></l1>
				<l1><?php echo $numerodni_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cCarrera">Carrera: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php
				include_once "conexion.php";
				$consultaCarrera=pg_query("SELECT * FROM carrera");
				while($rowTipo=pg_fetch_array($consultaCarrera,NULL,PGSQL_ASSOC)){
							$id = $rowTipo['id_carrera'];
							if($id == $carrera_alumno){
								echo $rowTipo['nombre_carrera']; 
							}
						}
			?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cFecha">Fecha de Nacimiento: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $fechanacimiento_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cProvinciaNacimiento">Provincia Nacimiento: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $provincia_nac_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cLocalidadNacimiento">Localidad Nacimiento: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $localidad_nac_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cProvinciaTrabajo">Provincia Trabajo: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $provincia_trabajo_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cLocalidadTrabajo">Localidad Trabajo: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $localidad_trabajo_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cProvinciaViviendo">Provincia Viviendo: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $provincia_viviendo_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cLocalidadViviendo">Localidad Viviendo: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $localidad_viviendo_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cCalle">Calle y N&uacute;mero: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $calle_alumno; ?></l1>
			<l1><?php echo $numerocalle_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cMail">Mail: </label>
		</td>
		<td align="left" width="70%">
			<l2><?php echo $mail_alumno; ?></l2>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cMail">Mail: </label>
		</td>
		<td align="left" width="70%">
			<l2><?php echo $mail_alumno2; ?></l2>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cFacebook">Facebook: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $facebook_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cFacebook">Twitter: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $twitter_alumno; ?></l1>
		</td>
	</tr>
</table>
<form  id="form1" action="?control=1" method="post">
<table>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cCaracteristica">Tel&eacute;fono: </label>
		</td>
		<td align="left" width="70%">
			<input id="cCaracteristica" name="caracteristica_alumno" type="text" value="" size="3" maxlength="5" class="caracteristica"/>
			<input id="cTelefono" name="telefono_alumno" type="text" value="" size="13" class="number"/>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cDuenioTel">Pertenece a: </label>
		</td>
		<td align="left" width="70%">
			<input id="cDuenioTel" name="duenio_del_telefono" type="text" value="" size="22"/>
			<?php echo '<input type="hidden" name="idAlumno" value="'.$id_Alumno.'" />'; ?>
			<input type="submit" value="Cargar"/>
		</td>
	<tr width="100%">
		<td align="right" width="30%">
			<ul type = disk >
				&nbsp;
			</ul>
		</td>
		<td align="left" width="70%">
			<?php				
				$telefonosAlumno = pg_query("SELECT * FROM telefonos_del_alumno WHERE alumno_fk = $id_Alumno");
				while($rowTA=pg_fetch_array($telefonosAlumno,NULL,PGSQL_ASSOC)){				
					echo '<l3>';
					echo '<li>'.$rowTA['duenio_del_telefono'].': '.$rowTA['caracteristica_alumno'].'-'.$rowTA['telefono_alumno'].$esp.'<a href="eliminarTelefonosAlumnos.php?eliminar=1&idAlumno='.$id_Alumno.'&idEliminarTA='.$rowTA['id_telefonos_del_alumno'].'"><img src="eliminar2.png" width="16" height="16" name="Eliminar" value="Eliminar"/></a><br>';
					echo '</l3>';}
			?>
		</td>
	</tr>
</table>
</form>
<table align="center" id="tabla" cellpadding="2" cellspacing="2" width="100%">
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cPerfilAcademico">Perfil Acad&eacute;mico: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $perfilacademico_alumno; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td align="right" width="30%">
			<label for="cPerfilLaboral">Perfil Laboral: </label>
		</td>
		<td align="left" width="70%">
			<l1><?php echo $perfil_laboral_alumno; ?></l1>
		</td>
	</tr>
</table>
<table align="center" id="tabla" cellpadding="2" cellspacing="2" width="100%">
	<tr width="100%">
		<td width="100%" colspan="2">
			&nbsp;
		</td>
	</tr>
	<tr width="100%">
		<td align="center" colspan="2" width="100%">
			<?php
				if( $seGuardo > 0 ){
					echo '<a href="listadoAlumno.php"><input type="button" onclick="confirmation()" name="Guardar" value="Guardar"/></a>';
				}else{
					echo '<input type="button" onclick="faltaTel()" name="Guardar" value="Guardar"/>';
				}
			?>
			<a href="registrarGraduado.php?idAlumno=<?php echo $id_Alumno;?>"><input type="button" value="Atr&aacute;s"></a>
		</td>
	</tr>
</table>
</fieldset>
</div>
</body>
</html>