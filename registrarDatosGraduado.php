<meta charset="UTF-8" />
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Alumno = (empty($_REQUEST['idAlumno'])) ? 0 : $_REQUEST['idAlumno'];
//echo 'idAlumno: '.$id_Alumno;

//----------------------------------------------------------------------------------------------

$datos = $_POST["hiddenLisTel"];
//echo $datos;
$vDatos = explode('/--/--/',$datos);
//echo $vDatos[0];
//echo count($vDatos);
$sqlGuardar = '';
//echo $id_cv;
$idToDrop = '';
$toDrop = false;

for($i = 0; $i < count($vDatos) - 1; $i++){
	$vTel = explode('/--/', $vDatos[$i]);
	$idTel = $vTel[3];
	if($idTel != '-1'){
		//echo $idTel.'<br>';
		$toDrop = true;
		if(strlen($idToDrop) == 0){
			$idToDrop = $idTel;
		}else{
			$idToDrop .= ','.$idTel;
		}
	}
}

if($toDrop == true){
	$sqlDrop = "DELETE FROM telefonos_del_alumno WHERE alumno_fk='$id_Alumno' AND id_telefonos_del_alumno NOT IN($idToDrop);";
	//echo $sqlDrop;
	
	if(guardarSql($sqlDrop) == 1){
		$redireccion = 'registrarGraduado.php?idAlumno='.$id_Alumno;
		mostrarMensaje('Los datos no se pudieron guardar correctamente 1',$redireccion);
	}
}

if(count($vDatos) == 1){
	$sqlDrop = "DELETE FROM telefonos_del_alumno WHERE alumno_fk='$id_Alumno';";
	//echo $sqlDrop;
	
	if(guardarSql($sqlDrop) == 1){
		$redireccion = 'registrarGraduado.php?idAlumno='.$id_Alumno;
		mostrarMensaje('Los datos no se pudieron guardar correctamente 2',$redireccion);
	}
}
$ultimo_id = traerUltimo('id_telefonos_del_alumno', 'telefonos_del_alumno');
if(count($vDatos) > 1){
	for($i = 0; $i < count($vDatos) - 1; $i++){
		$vTel = explode('/--/', $vDatos[$i]);
		$idTel = $vTel[3];
		if($idTel == '-1'){
			//$ultimo_id = traerId('id_telefonos_del_alumno', 'telefonos_del_alumno');
			$ultimo_id++;
			echo 'ultimo: '.$ultimo_id;
			$sqlGuardar .= "INSERT INTO telefonos_del_alumno(id_telefonos_del_alumno,caracteristica_alumno,telefono_alumno,duenio_del_telefono,alumno_fk) VALUES($ultimo_id,'$vTel[1]','$vTel[2]','$vTel[0]','$id_Alumno');";
		}else{
			$sqlGuardar .= "UPDATE telefonos_del_alumno SET caracteristica_alumno='$vTel[1]', telefono_alumno='$vTel[2]', duenio_del_telefono='$vTel[0]', alumno_fk='$id_Alumno' WHERE id_telefonos_del_alumno = '$idTel';";
		}
	}

	// //echo $sqlGuardar;
	// $error = guardarSql($sqlGuardar);

	// if ($error == 1) {
	// 	$redireccion = 'registrarGraduado.php?idAlumno='.$id_Alumno;
	// 	mostrarMensaje('Los datos no se pudieron guardar correctamente',$redireccion);
	// }else{
	// 	echo '<script> window.location = "lis.php?idcv='.$id_cv.'";</script>';
	// }
}

$gra_nombre = trim(ucwords($_REQUEST['gra_nombre']));
$gra_apellido = trim(ucwords($_REQUEST['gra_apellido']));
$gra_tipodoc = trim($_REQUEST['gra_tipodoc']);
$gra_nrodoc = trim($_REQUEST['gra_nrodoc']);
$gra_fecnac = empty($_REQUEST['gra_fecnac']) ? '1900-01-01' : trim($_REQUEST['gra_fecnac']);
$gra_carrera = trim($_REQUEST['gra_carrera']);
$gra_grupo = trim($_REQUEST['gra_grupo']);
$gra_locnac = (empty($_REQUEST['gra_locnac'])) ? 0 : $_REQUEST['gra_locnac'];
$gra_loctrab = (empty($_REQUEST['gra_loctrab'])) ? 0 : $_REQUEST['gra_loctrab'];
$gra_locvive = (empty($_REQUEST['gra_locvive'])) ? 0 : $_REQUEST['gra_locvive'];
$gra_calle = trim(ucwords($_REQUEST['gra_calle']));
$gra_nrocalle = trim($_REQUEST['gra_nrocalle']);
$gra_depto = trim($_REQUEST['gra_depto']);
$gra_piso = trim($_REQUEST['gra_piso']);
$gra_mail1 = trim($_REQUEST['gra_mail1']);
$gra_mail2 = trim($_REQUEST['gra_mail2']);
$gra_docente = ($_REQUEST['gra_docente'] == 0) ? 'FALSE' : 'TRUE';
$gra_especialidad = trim(ucfirst($_REQUEST['gra_especialidad']));
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
	$consultas= "INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,mail_alumno,facebook_alumno,numerodni_alumno,tipodni_alumno,calle_alumno,perfilacademico_alumno,foto_alumno,carrera_alumno,ancho_final,alto_final,fechanacimiento_alumno,numerocalle_alumno,mail_alumno2,twitter_alumno,localidad_nac_alumno,localidad_trabajo_alumno,localidad_viviendo_alumno,perfil_laboral_alumno,gra_depto,gra_piso,gra_docente,gra_especialidad)VALUES('$id_Alumno','$gra_nombre','$gra_apellido','$gra_mail1','$gra_facebook','$gra_nrodoc',$gra_tipodoc,'$gra_calle','$gra_peraca','$destino_bd',$gra_carrera,'$ancho_final','$alto_final','$gra_fecnac','$gra_nrocalle','$gra_mail2','$gra_twitter',$gra_locnac,$gra_loctrab,$gra_locvive,'$gra_perlab','$gra_depto','$gra_piso','$gra_docente','$gra_especialidad');";
	//ASIGNO AL GRADUADO A UN GRUPO
	$consultas .= "INSERT INTO alumnos_por_grupo(grupo_fk, alumno_fk)VALUES('$gra_grupo','$id_Alumno');";

	//$consultas .= "INSERT INTO telefonos_del_alumno(grupo_fk, alumno_fk)VALUES('$gra_grupo','$id_Alumno');";

}elseif ($id_Alumno != 0) {

	//UPDATE
	//VERIFICO SI TIENE FOTO CARGADA PREVIAMENTE.
	//$tiene_foto = contarRegistro('*','alumno','foto_alumno <> '' AND id_alumno = '.$id_Alumno); //$tiene_foto > 0, si tiene foto de antes.
	//echo 'nombreFoto: '.$nombreFoto;
	if(empty($nombreFoto)){
		$consultas = "UPDATE alumno SET nombre_alumno = '$gra_nombre',apellido_alumno = '$gra_apellido',mail_alumno = '$gra_mail1',facebook_alumno = '$gra_facebook',numerodni_alumno = '$gra_nrodoc',tipodni_alumno = $gra_tipodoc,calle_alumno = '$gra_calle',perfilacademico_alumno = '$gra_peraca',carrera_alumno = $gra_carrera,fechanacimiento_alumno = '$gra_fecnac',numerocalle_alumno = '$gra_nrocalle',mail_alumno2 = '$gra_mail2',twitter_alumno = '$gra_twitter',localidad_nac_alumno = $gra_locnac,localidad_trabajo_alumno = $gra_loctrab,localidad_viviendo_alumno = $gra_locvive,perfil_laboral_alumno = '$gra_perlab',gra_depto = '$gra_depto',gra_piso = '$gra_piso', gra_docente = '$gra_docente', gra_especialidad = '$gra_especialidad' WHERE id_alumno = $id_Alumno;";
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
		$consultas = "UPDATE alumno SET nombre_alumno = '$gra_nombre',apellido_alumno = '$gra_apellido',mail_alumno = '$gra_mail1',facebook_alumno = '$gra_facebook',numerodni_alumno = '$gra_nrodoc',tipodni_alumno = $gra_tipodoc,calle_alumno = '$gra_calle',perfilacademico_alumno = '$gra_peraca',foto_alumno = '$destino_bd',carrera_alumno = $gra_carrera,ancho_final = '$ancho_final',alto_final = '$alto_final',fechanacimiento_alumno = '$gra_fecnac',numerocalle_alumno = '$gra_nrocalle',mail_alumno2 = '$gra_mail2',twitter_alumno = '$gra_twitter',localidad_nac_alumno = $gra_locnac,localidad_trabajo_alumno = $gra_loctrab,localidad_viviendo_alumno = $gra_locvive,perfil_laboral_alumno = '$gra_perlab',gra_depto = '$gra_depto',gra_piso = '$gra_piso', gra_docente = '$gra_docente', gra_especialidad = '$gra_especialidad' WHERE id_alumno = $id_Alumno;";
	}
}

$error = guardarSql($consultas.$sqlGuardar);

include_once "cerrar_conn.php";
if ($error == 1){
	echo '<script language="JavaScript"> window.location="registrarGraduado.php";   alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador"); </script>';
}else{
	echo '<script language="JavaScript">  window.location="listadoAlumno.php";	alert("Los datos se guardaron correctamente"); </script>';
}

?>