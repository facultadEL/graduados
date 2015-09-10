<meta charset="UTF-8" />
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Alumno = (empty($_REQUEST['idAlumno'])) ? 0 : $_REQUEST['idAlumno'];


$gra_nombre = trim(ucwords($_REQUEST['gra_nombre']));
$gra_apellido = trim(ucwords($_REQUEST['gra_apellido']));
$gra_tipodoc = trim($_REQUEST['gra_tipodoc']);
$gra_nrodoc = trim($_REQUEST['gra_nrodoc']);
$gra_fecnac = trim($_REQUEST['gra_fecnac']);
$gra_carrera = trim($_REQUEST['gra_carrera']);
$gra_grupo = trim($_REQUEST['gra_grupo']);
$gra_provnac = trim($_REQUEST['gra_provnac']);
$gra_locnac = trim($_REQUEST['gra_locnac']);
$gra_provtrab = trim($_REQUEST['gra_provtrab']);
$gra_loctrab = trim($_REQUEST['gra_loctrab']);
$gra_provive = trim($_REQUEST['gra_provive']);
$gra_locvive = trim($_REQUEST['gra_locvive']);
$gra_calle = trim(ucwords($_REQUEST['gra_calle']));
$gra_nrocalle = trim($_REQUEST['gra_nrocalle']);
$gra_depto = trim($_REQUEST['gra_depto']);
$gra_piso = trim($_REQUEST['gra_piso']);
$gra_mail1 = trim($_REQUEST['gra_mail1']);
$gra_mail2 = trim($_REQUEST['gra_mail2']);
$gra_facebook = trim(ucwords($_REQUEST['gra_facebook']));
$gra_twitter = trim($_REQUEST['gra_twitter']);
$gra_peraca = trim(ucfirst($_REQUEST['gra_peraca']));
$gra_perlab = trim(ucfirst($_REQUEST['gra_perlab']));

//RECIBO LOS DATOS DE LA FOTO
$nombreFoto = $_FILES['gra_foto']['name'];
$tipo_archivo = $_FILES['gra_foto']['type'];	
$tamano_archivo = $_FILES['gra_foto']['size'];
$archivo_foto = $_FILES['gra_foto']['tmp_name'];

if ($id_Alumno == 0){

	//LE QUITO LOS ESPACIOS AL NOMBRE DEL ARCHIVO
	$nombre_foto = str_replace(" ", "-", $nombreFoto);

	//CARGO LOS DATOS DEL SERVIDOR
	$ftp_server = "190.114.198.126";
	$ftp_user_name = "fernandoserassioextension";
	$ftp_user_pass = "fernando2013";
	$destino_serv = "web/graduados/fotos/".$nombre_foto;
	$destino_bd = "fotos/".$nombre_foto;

	//conexión
	$conn_serv = ftp_connect($ftp_server); 
	// logeo
	$login_result = ftp_login($conn_serv, $ftp_user_name, $ftp_user_pass);
	// archivo a copiar/subir
	if (!empty($nombre_foto)) {
		$upload = ftp_put($conn_serv, $destino_serv, $archivo_foto, FTP_BINARY);
	}
	// cerramos
	ftp_close($conn_serv);

	$imagen = explode(".", $nombre_foto);
	$totalImagen=count($imagen);
	$formato = $totalImagen - 1;

	if ($imagen[$formato] == "jpeg" || $imagen[$formato] == "jpg"){

		$imagen_origen = imagecreatefromjpeg($destino_bd);
		//obtengo el ancho de la imagen original
		$ancho_origen = imagesx($imagen_origen);
		//obtengo el alto de la imagen original
		$alto_origen = imagesy($imagen_origen);
		
		$ancho_final = 600;
		$alto_final = 400;

		if($ancho_origen > $alto_origen){
			//foto horizontal
			$alto_final = ($alto_origen * $ancho_final) / $ancho_origen;    
		}else{
			//fotos verticales
			$ancho_final = ($ancho_origen * $alto_final) / $alto_origen;
		}

		// creo la imagen con el tamaño que le pase
		$imagen_final = imagecreatetruecolor($ancho_final ,$alto_final );

		imagecopyresized( $imagen_final, $imagen_origen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_origen, $alto_origen);
			
		//guardo la nueva foto (nuevaFoto, destino, calidad)
		imagejpeg($imagen_final, $destino_bd, 100);

	}elseif ($imagen[$formato] == "png") {

		$imagen_origen = imagecreatefrompng($destino_bd);

		//obtengo el ancho de la imagen original
		$ancho_origen = imagesx($imagen_origen);
		//obtengo el alto de la imagen original
		$alto_origen = imagesy($imagen_origen);
		
		$ancho_final = 600;
		$alto_final = 400;
		
		if($ancho_origen > $alto_origen){
			//foto horizontal
			$alto_final = ($alto_origen * $ancho_final) / $ancho_origen;    
		}else{
			//fotos verticales
			$ancho_final = ($ancho_origen * $alto_final) / $alto_origen;
		}

		// creo la imagen con el tamaño que le pase
		$imagen_final = imagecreatetruecolor($ancho_final ,$alto_final );

		//Copio y cambio el tamaño de la imagen
		imagecopyresized( $imagen_final, $imagen_origen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_origen, $alto_origen);
		
		//guardo la nueva foto (nuevaFoto, destino, calidad)
		imagepng( $imagen_final, $destino_bd, 9 );
	}


	$id_Alumno = traerId('id_alumno','alumno');
	//NUEVO GRADUADO
	$consultas= "INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,mail_alumno,facebook_alumno,numerodni_alumno,tipodni_alumno,calle_alumno,perfilacademico_alumno,foto_alumno,carrera_alumno,ancho_final,alto_final,fechanacimiento_alumno,numerocalle_alumno,mail_alumno2,twitter_alumno,provincia_nac_alumno,localidad_nac_alumno,provincia_trabajo_alumno,localidad_trabajo_alumno,provincia_viviendo_alumno,localidad_viviendo_alumno,perfil_laboral_alumno,gra_depto,gra_piso)VALUES('$id_Alumno','$gra_nombre','$gra_apellido','$gra_mail1','$gra_facebook','$gra_nrodoc',$gra_tipodoc,'$gra_calle','$gra_peraca','$destino_bd',$gra_carrera,'$ancho_final','$alto_final','$gra_fecnac','$gra_nrocalle','$gra_mail2','$gra_twitter',$gra_provnac,$gra_locnac,$gra_provtrab,$gra_loctrab,$gra_provive,$gra_locvive,'$gra_perlab','$gra_depto','$gra_piso');";
	//ASIGNO AL GRADUADO A UN GRUPO
	$consultas .= "INSERT INTO alumnos_por_grupo(grupo_fk, alumno_fk)VALUES('$gra_grupo','$id_Alumno');";
	//echo $consultas;
	$error = guardarSql($consultas);

	include_once "cerrar_conn.php";
	if ($error == 1){
		echo '<script language="JavaScript"> window.location="registrarGraduado.php";   alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador"); </script>';
	}else{
		echo '<script language="JavaScript">  window.location="listadoAlumno.php";	alert("Los datos se guardaron correctamente"); </script>';
	}

}else{

	//UPDATE
	//VERIFICO SI TIENE FOTO CARGADA PREVIAMENTE.
	//$tiene_foto = contarRegistro('*','alumno','foto_alumno <> '' AND id_alumno = '.$id_Alumno); //$tiene_foto > 0, si tiene foto de antes.
		
	if(empty($nombreFoto)){
		$consultas = "UPDATE alumno SET nombre_alumno = '$gra_nombre',apellido_alumno = '$gra_apellido',mail_alumno = '$gra_mail1',facebook_alumno = '$gra_facebook',numerodni_alumno = '$gra_nrodoc',tipodni_alumno = $gra_tipodoc,calle_alumno = '$gra_calle',perfilacademico_alumno = '$gra_peraca',carrera_alumno = $gra_carrera,fechanacimiento_alumno = '$gra_fecnac',numerocalle_alumno = '$gra_nrocalle',mail_alumno2 = '$gra_mail2',twitter_alumno = '$gra_twitter',provincia_nac_alumno = $gra_provnac,localidad_nac_alumno = $gra_locnac,provincia_trabajo_alumno = $gra_provtrab,localidad_trabajo_alumno = $gra_loctrab,provincia_viviendo_alumno = $gra_provive,localidad_viviendo_alumno = $gra_locvive,perfil_laboral_alumno = '$gra_perlab',gra_depto = '$gra_depto',gra_piso = '$gra_piso' WHERE id_alumno = $id_Alumno;";
	}else{
		//LE QUITO LOS ESPACIOS AL NOMBRE DEL ARCHIVO
		$nombre_foto = str_replace(" ", "-", $nombreFoto);

		//CARGO LOS DATOS DEL SERVIDOR
		$ftp_server = "190.114.198.126";
		$ftp_user_name = "fernandoserassioextension";
		$ftp_user_pass = "fernando2013";
		$destino_serv = "web/graduados/fotos/".$nombre_foto;
		$destino_bd = "fotos/".$nombre_foto;

		//conexión
		$conn_serv = ftp_connect($ftp_server); 
		// logeo
		$login_result = ftp_login($conn_serv, $ftp_user_name, $ftp_user_pass);
		// archivo a copiar/subir
		if (!empty($nombre_foto)) {
			$upload = ftp_put($conn_serv, $destino_serv, $archivo_foto, FTP_BINARY);
		}
		// cerramos
		ftp_close($conn_serv);

		$imagen = explode(".", $nombre_foto);
		$totalImagen=count($imagen);
		$formato = $totalImagen - 1;

		if ($imagen[$formato] == "jpeg" || $imagen[$formato] == "jpg"){

			$imagen_origen = imagecreatefromjpeg($destino_bd);
			//obtengo el ancho de la imagen original
			$ancho_origen = imagesx($imagen_origen);
			//obtengo el alto de la imagen original
			$alto_origen = imagesy($imagen_origen);
			
			$ancho_final = 600;
			$alto_final = 400;

			if($ancho_origen > $alto_origen){
				//foto horizontal
				$alto_final = ($alto_origen * $ancho_final) / $ancho_origen;    
			}else{
				//fotos verticales
				$ancho_final = ($ancho_origen * $alto_final) / $alto_origen;
			}

			// creo la imagen con el tamaño que le pase
			$imagen_final = imagecreatetruecolor($ancho_final ,$alto_final );

			imagecopyresized( $imagen_final, $imagen_origen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_origen, $alto_origen);
				
			//guardo la nueva foto (nuevaFoto, destino, calidad)
			imagejpeg($imagen_final, $destino_bd, 100);

		}elseif ($imagen[$formato] == "png") {

			$imagen_origen = imagecreatefrompng($destino_bd);

			//obtengo el ancho de la imagen original
			$ancho_origen = imagesx($imagen_origen);
			//obtengo el alto de la imagen original
			$alto_origen = imagesy($imagen_origen);
			
			$ancho_final = 600;
			$alto_final = 400;
			
			if($ancho_origen > $alto_origen){
				//foto horizontal
				$alto_final = ($alto_origen * $ancho_final) / $ancho_origen;    
			}else{
				//fotos verticales
				$ancho_final = ($ancho_origen * $alto_final) / $alto_origen;
			}

			// creo la imagen con el tamaño que le pase
			$imagen_final = imagecreatetruecolor($ancho_final ,$alto_final );

			//Copio y cambio el tamaño de la imagen
			imagecopyresized( $imagen_final, $imagen_origen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_origen, $alto_origen);
			
			//guardo la nueva foto (nuevaFoto, destino, calidad)
			imagepng( $imagen_final, $destino_bd, 9 );
		}
		$consultas = "UPDATE alumno SET nombre_alumno = '$gra_nombre',apellido_alumno = '$gra_apellido',mail_alumno = '$gra_mail1',facebook_alumno = '$gra_facebook',numerodni_alumno = '$gra_nrodoc',tipodni_alumno = $gra_tipodoc,calle_alumno = '$gra_calle',perfilacademico_alumno = '$gra_peraca',foto_alumno = '$destino_bd',carrera_alumno = $gra_carrera,ancho_final = '$ancho_final',alto_final = '$alto_final',fechanacimiento_alumno = '$gra_fecnac',numerocalle_alumno = '$gra_nrocalle',mail_alumno2 = '$gra_mail2',twitter_alumno = '$gra_twitter',provincia_nac_alumno = $gra_provnac,localidad_nac_alumno = $gra_locnac,provincia_trabajo_alumno = $gra_provtrab,localidad_trabajo_alumno = $gra_loctrab,provincia_viviendo_alumno = $gra_provive,localidad_viviendo_alumno = $gra_locvive,perfil_laboral_alumno = '$gra_perlab',gra_depto = '$gra_depto',gra_piso = '$gra_piso' WHERE id_alumno = $id_Alumno;";
	}

	$error = guardarSql($consultas);

	include_once "cerrar_conn.php";
	if ($error == 1){
		echo '<script language="JavaScript"> window.location="registrarGraduado.php";   alert("Los datos no se modificaron correctamente. Pongase en contacto con el administrador"); </script>';
	}else{
		echo '<script language="JavaScript">  window.location="listadoAlumno.php";	alert("Los datos se modificaron correctamente"); </script>';
	}
}

?>