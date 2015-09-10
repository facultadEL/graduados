<meta charset="UTF-8" />
<?php
include_once "conexion.php";
include_once "libreria.php";

$gra_sql = '';
$graduados = traerSql('*','alumno','');
while($rowGrad=pg_fetch_array($graduados)){
	$id_alumno = $rowGrad['id_alumno'];
	$nombre_alumno = ucwords(trim($rowGrad['nombre_alumno']));
	$apellido_alumno = ucwords(trim($rowGrad['apellido_alumno']));
	$facebook_alumno = trim($rowGrad['facebook_alumno']);
	$numerodni_alumno = trim($rowGrad['numerodni_alumno']);
	$tipodni_alumno = trim($rowGrad['tipodni_alumno']);
	$foto_alumno = trim($rowGrad['foto_alumno']);
	$carrera_alumno = trim($rowGrad['carrera_alumno']);
	$ancho_final = trim($rowGrad['ancho_final']);
	$alto_final = trim($rowGrad['alto_final']);
	$fechanacimiento_alumno = trim($rowGrad['fechanacimiento_alumno']);
	$numerocalle_alumno = trim($rowGrad['numerocalle_alumno']);
	//$gra_depto = trim($rowGrad['gra_depto']);
	//$gra_piso = trim($rowGrad['gra_piso']);
	$mail_alumno = trim($rowGrad['mail_alumno']);
	$mail_alumno2 = trim($rowGrad['mail_alumno2']);
	$twitter_alumno = trim($rowGrad['twitter_alumno']);
	$provincia_nac_alumno = trim($rowGrad['provincia_nac_alumno']);
	$localidad_nac_alumno = trim($rowGrad['localidad_nac_alumno']);
	$provincia_trabajo_alumno = trim($rowGrad['provincia_trabajo_alumno']);
	$localidad_trabajo_alumno = trim($rowGrad['localidad_trabajo_alumno']);
	$provincia_viviendo_alumno = trim($rowGrad['provincia_viviendo_alumno']);
	$localidad_viviendo_alumno = trim($rowGrad['localidad_viviendo_alumno']);
	$perfilacademico_alumno = ucfirst(trim($rowGrad['perfilacademico_alumno']));
	$perfil_laboral_alumno = ucfirst(trim($rowGrad['perfil_laboral_alumno']));

	$cba1 = "Córdoba";
	$cba2 = "Cordoba";
	$cba3 = "Cba";
	$cba4 = "Capital Córdoba";
	$cba5 = "Capital Cordoba";

	$bsas1 = "Bs As";
	$bsas3 = "BsAs";
	$bsas2 = "Buenos Aires";
	$bsas4 = "copital";

	$entre_rios1 = "Entre Ríos";
	$entre_rios2 = "Entre Rios";

	$santa_fe1 = "Santa Fé";
	$santa_fe2 = "Santa Fe";

	$tucuman1 = "Tucumán";
	$tucuman2 = "Tucuman";

	$neuquen1 = "Neuquen";

	//PROVINCIA NACIMIENTO
	if (strtolower($provincia_nac_alumno) == strtolower($cba1) || strtolower($provincia_nac_alumno) == strtolower($cba2) || strtolower($provincia_nac_alumno) == strtolower($cba3) || strtolower($provincia_nac_alumno) == strtolower($cba4) || strtolower($provincia_nac_alumno) == strtolower($cba5)) {
		$provincia_nac_alumno = 5;
	}

	if (strtolower($provincia_nac_alumno) == strtolower($bsas1) || strtolower($provincia_nac_alumno) == strtolower($bsas2) || strtolower($provincia_nac_alumno) == strtolower($bsas3)) {
		$provincia_nac_alumno = 1;
	}

	if (strtolower($provincia_nac_alumno) == strtolower($entre_rios1) || strtolower($provincia_nac_alumno) == strtolower($entre_rios2)) {
		$provincia_nac_alumno = 7;
	}

	if (strtolower($provincia_nac_alumno) == strtolower($santa_fe1) || strtolower($provincia_nac_alumno) == strtolower($santa_fe2)) {
		$provincia_nac_alumno = 20;
	}

	if (strtolower($provincia_nac_alumno) == strtolower($tucuman1) || strtolower($provincia_nac_alumno) == strtolower($tucuman2)) {
		$provincia_nac_alumno = 23;
	}

	if (strtolower($provincia_nac_alumno) == strtolower($neuquen1)) {
		$provincia_nac_alumno = 14;
	}

	//PROVINCIA TRABAJO
	if (strtolower($provincia_trabajo_alumno) == strtolower($cba1) || strtolower($provincia_trabajo_alumno) == strtolower($cba2) || strtolower($provincia_trabajo_alumno) == strtolower($cba3) || strtolower($provincia_trabajo_alumno) == strtolower($cba4) || strtolower($provincia_trabajo_alumno) == strtolower($cba5)) {
		$provincia_trabajo_alumno = 5;
	}

	if (strtolower($provincia_trabajo_alumno) == strtolower($bsas1) || strtolower($provincia_trabajo_alumno) == strtolower($bsas2) || strtolower($provincia_trabajo_alumno) == strtolower($bsas3) || strtolower($provincia_trabajo_alumno) == strtolower($bsas4)) {
		$provincia_trabajo_alumno = 1;
	}

	if (strtolower($provincia_trabajo_alumno) == strtolower($entre_rios1) || strtolower($provincia_trabajo_alumno) == strtolower($entre_rios2)) {
		$provincia_trabajo_alumno = 7;
	}

	if (strtolower($provincia_trabajo_alumno) == strtolower($santa_fe1) || strtolower($provincia_trabajo_alumno) == strtolower($santa_fe2)) {
		$provincia_trabajo_alumno = 20;
	}

	if (strtolower($provincia_trabajo_alumno) == strtolower($tucuman1) || strtolower($provincia_trabajo_alumno) == strtolower($tucuman2)) {
		$provincia_trabajo_alumno = 23;
	}

	if (strtolower($provincia_trabajo_alumno) == strtolower($neuquen1)) {
		$provincia_trabajo_alumno = 14;
	}

	//PROVINCIA VIVE
	if (strtolower($provincia_viviendo_alumno) == strtolower($cba1) || strtolower($provincia_viviendo_alumno) == strtolower($cba2) || strtolower($provincia_viviendo_alumno) == strtolower($cba3) || strtolower($provincia_viviendo_alumno) == strtolower($cba4) || strtolower($provincia_viviendo_alumno) == strtolower($cba5)) {
		$provincia_viviendo_alumno = 5;
	}

	if (strtolower($provincia_viviendo_alumno) == strtolower($bsas1) || strtolower($provincia_viviendo_alumno) == strtolower($bsas2) || strtolower($provincia_viviendo_alumno) == strtolower($bsas3)) {
		$provincia_viviendo_alumno = 1;
	}

	if (strtolower($provincia_viviendo_alumno) == strtolower($entre_rios1) || strtolower($provincia_viviendo_alumno) == strtolower($entre_rios2)) {
		$provincia_viviendo_alumno = 7;
	}

	if (strtolower($provincia_viviendo_alumno) == strtolower($santa_fe1) || strtolower($provincia_viviendo_alumno) == strtolower($santa_fe2)) {
		$provincia_viviendo_alumno = 20;
	}

	if (strtolower($provincia_viviendo_alumno) == strtolower($tucuman1) || strtolower($provincia_viviendo_alumno) == strtolower($tucuman2)) {
		$provincia_viviendo_alumno = 23;
	}

	if (strtolower($provincia_viviendo_alumno) == strtolower($neuquen1)) {
		$provincia_viviendo_alumno = 14;
	}

	echo 'prov. nac: '.$provincia_nac_alumno.'<br>';
	echo 'prov. trab: '.$provincia_trabajo_alumno.'<br>';
	echo 'prov. vive: '.$provincia_viviendo_alumno.'<br>';

//'".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$numerocalle_alumno."','".$gra_depto."','".$gra_piso."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$provincia_nac_alumno."','".$localidad_nac_alumno."','".$provincia_trabajo_alumno."','".$localidad_trabajo_alumno."','".$provincia_viviendo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."'

	//$gra_sql .= "INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,facebook_alumno,numerodni_alumno,tipodni_alumno,foto_alumno,carrera_alumno,ancho_final,alto_final,fechanacimiento_alumno,numerocalle_alumno,gra_depto,gra_piso,mail_alumno,mail_alumno2,twitter_alumno,provincia_nac_alumno,localidad_nac_alumno,provincia_trabajo_alumno,localidad_trabajo_alumno,provincia_viviendo_alumno,localidad_viviendo_alumno,perfilacademico_alumno,perfil_laboral_alumno) VALUES ('".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$numerocalle_alumno."','".$gra_depto."','".$gra_piso."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$provincia_nac_alumno."','".$localidad_nac_alumno."','".$provincia_trabajo_alumno."','".$localidad_trabajo_alumno."','".$provincia_viviendo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."');<br>";
	$gra_sql .= "INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,facebook_alumno,numerodni_alumno,tipodni_alumno,foto_alumno,carrera_alumno,ancho_final,alto_final,fechanacimiento_alumno,numerocalle_alumno,mail_alumno,mail_alumno2,twitter_alumno,provincia_nac_alumno,localidad_nac_alumno,provincia_trabajo_alumno,localidad_trabajo_alumno,provincia_viviendo_alumno,localidad_viviendo_alumno,perfilacademico_alumno,perfil_laboral_alumno) VALUES ('".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$numerocalle_alumno."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$provincia_nac_alumno."','".$localidad_nac_alumno."','".$provincia_trabajo_alumno."','".$localidad_trabajo_alumno."','".$provincia_viviendo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."');<br>";
}


//include_once("conexionCursoExtension.php");
echo $gra_sql;

include_once "cerrar_conn.php";
?>