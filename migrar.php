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

	$a_cabral1 = "Arroyo cabral";
	$alicia1 = "Alicia";
	$a_algodon1 = "Arroyo Algodon";
	$a_algodon2 = "Arroyo Algodón";
	$alma1 = "Almafuerte";
	$ausonia1 = "Ausonia";

	$bs_as1 = "Capital Federal";
	$bs_as2 = "bs as";
	$bs_as3 = "Ciudad Autonoma de Buenos Aires";
	$bs_as4 = "CABA";
	$bs_as5 = "Ciudad Aut. De Buenos Aires";
	$bs_as6 = "Cap. Federal";
	$bell_ville1 = "Bell Ville";
	$bell_ville2 = "Bell Vill";
	$ballesteros1 = "Ballesteros";
	$ballesteros_sud1 = "Ballesteros Sud";

	$carrilobo1 = "Carrilobo";
	$cba1 = "Córdoba";
	$cba2 = "Cordoba";
	$cba3 = "Cba";
	$cba4 = "Capital Córdoba";
	$cba5 = "Capital Cordoba";
	$cba6 = "capital";
	$canals1 = "Canals";
	$c_marina1 = "Colonia Marina";
	$chili1 = "Chilibroste";
	$chazon1 = "Chazón";
	$c_d_bustos1 = "Corral de Bustos";
	$c_oeste1 = "Calchin Oeste";

	$dean_funes1 = "Dean Funes";
	$dean_funes2 = "Dean Funez";
	$dean_funes3 = "Deán Funez";
	$dean_funes4 = "Deán Funes";

	$e_aranado1 = "El Arañado"
	$embalse1 = "Embalse"
	$etruria1 = "Etruria";

	$g_deheza1 = "Gral Deheza";
	$g_deheza2 = "General Deheza";
	$g_lavalle1 = "General Lavalle";
	$g_baldi1 = "Gral Baldisera";
	$g_baldi2 = "General Baldissera";
	$g_cabre1 = "General Cabrera";

	$hernando1 = "Herenando";
	$hernando2 = "Hernando";
	$holm1 = "Holmberg";

	$isla_verde1 = "Isla verde";
	$idiazabal1 = "Idiazabal";
	$inrri1 = "Inriville";

	$j_pose1 = "Justiniano Posse";
	$j_maria1 = "Jesus Maria";
	$j_maria2 = "Jesus María";
	$j_craik1 = "James craik";

	$las_varillas1 = "Las Varillas";
	$las_varillas2 = "Las Varillas ";
	$l_perdices1 = "Las Perdices";
	$laborde1 = "Laborde";
	$l_playo1 = "La Playosa";
	$l_carlo1 = "La Carlota";

	$laboulaye1 = "Laboulaye";
	$lomas_zamora1 = "Lomas de Zamora";
	$leones1 = "Leones";
	$ll1 = "Laguna Larga";
	$laspiur1 = "Laspiur";
	$l_pozos1 = "Los Pozos";
	$l_pales1 = "La Palestina";
	$l_juntu1 = "Las Junturas";

	$moron1 = "MORON";
	$moron2 = "morón";
	$m_juarez1 = "Marcos Juarez";
	$morri1 = "Morrison";
	$m_buey1 = "Monte Buey";

	$noetinger1 = "Noetinger";
	$nogoya1 = "Nogoya";

	$oliva1 = "Oliva";
	$ordo1 = "Ordoñez";
	$oncativo1 = "Oncativo";

	$pascana1 = "Pascana";
	$p_molle1 = "Pozo Del Molle";
	$p_molle2 = "Pozo del Molle";
	$pasco1 = "Pasco";

	$ramos_mejia1 = "Ramos Mejia";
	$ramos_mejia2 = "Ramos Mejía";
	$rosario1 = "Rosario";
	$r_segundo1 = "Rio Segundo";
	$r_segundo2 = "Río Segundo";
	$r_tercero1 = "Río Tercero";
	$r_tercero2 = "Rio Tercero";
	$r_cuarto1 = "Rio Cuarto";
	$r_cuarto2 = "Río Cuarto";

	$s_m_tucu1 = "San Miguel de Tucumán";
	$s_m_tucu2 = "San Miguel de Tucuman";
	$s_marcos1 = "San Marcos";
	$src1 = "Santa Rosa De Ctalamuchita";
	$s_eufemia1 = "Santa Eufemia";
	$s_peli1 = "Silvio Pélico";

	$tio_pujio1 = "Tio Pujio";
	$tio_pujio2 = "Tío Pujio";
	$ticino1 = "Ticino";

	$ucacha1 = "Ucacha";

	$v_d_rosario1 = "Villa del Rosario";
	$vm1 = "Villa María";
	$vm2 = "Villa Maria";
	$vn1 = "Villa Nueva";
	$villa_const1 = "Villa Constitución";
	$villa_const2 = "Villa Constitucion";
	$villa_rumi1 = "Villa Rumipal";
	$v_guti1 = "Villa Gutierrez";

	//LOCALIDAD NACIMIENTO

	//A
	if (strtolower($localidad_nac_alumno) == strtolower($a_cabral1)) {
		$localidad_nac_alumno = 1436;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($alicia1)) {
		$localidad_nac_alumno = 1416;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($a_algodon1) || strtolower($localidad_nac_alumno) == strtolower($a_algodon2)) {
		$localidad_nac_alumno = 1435;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($alma1)) {
		$localidad_nac_alumno = 1417;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($ausonia1)) {
		$localidad_nac_alumno = 1441;
	}

	//B
	if (strtolower($localidad_nac_alumno) == strtolower($bs_as1) || strtolower($localidad_nac_alumno) == strtolower($bs_as2) || strtolower($localidad_nac_alumno) == strtolower($bs_as3) || strtolower($localidad_nac_alumno) == strtolower($bs_as4) || strtolower($localidad_nac_alumno) == strtolower($bs_as5) || strtolower($localidad_nac_alumno) == strtolower($bs_as6)) {
		$localidad_nac_alumno = 5440;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($bell_ville1) || strtolower($localidad_nac_alumno) == strtolower($bell_ville2)) {
		$localidad_nac_alumno = 1452;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($ballesteros1)) {
		$localidad_nac_alumno = 1445;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($ballesteros_sud1)) {
		$localidad_nac_alumno = 1446;
	}

	//C
	if (strtolower($localidad_nac_alumno) == strtolower($carrilobo1)) {
		$localidad_nac_alumno = 1500;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($cba1) || strtolower($localidad_nac_alumno) == strtolower($cba2) || strtolower($localidad_nac_alumno) == strtolower($cba3) || strtolower($localidad_nac_alumno) == strtolower($cba4) || strtolower($localidad_nac_alumno) == strtolower($cba5) || strtolower($localidad_nac_alumno) == strtolower($cba6)) {
		$localidad_nac_alumno = 1560;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($canals1)) {
		$localidad_nac_alumno = 1483;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($c_marina1)) {
		$localidad_nac_alumno = 1545;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($chili1)) {
		$localidad_nac_alumno = 1520;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($chazon1)) {
		$localidad_nac_alumno = 1519;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($c_d_bustos1)) {
		$localidad_nac_alumno = 1565;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($c_oeste1)) {
		$localidad_nac_alumno = 1470;
	}

	//D
	if (strtolower($localidad_nac_alumno) == strtolower($dean_funes1) || strtolower($localidad_nac_alumno) == strtolower($dean_funes2) || strtolower($localidad_nac_alumno) == strtolower($dean_funes3) || strtolower($localidad_nac_alumno) == strtolower($dean_funes4)) {
		$localidad_nac_alumno = 1589;
	}
	
	//E
	if (strtolower($localidad_nac_alumno) == strtolower($e_aranado1)) {
		$localidad_nac_alumno = 1597;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($embalse1)) {
		$localidad_nac_alumno = 1637;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($etruria1)) {
		$localidad_nac_alumno = 1644;
	}

	//G
	if (strtolower($localidad_nac_alumno) == strtolower($g_deheza1) || strtolower($localidad_nac_alumno) == strtolower($g_deheza2)) {
		$localidad_nac_alumno = 1657;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($g_lavalle1)) {
		$localidad_nac_alumno = 1659;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($g_baldi1) || strtolower($localidad_nac_alumno) == strtolower($g_baldi2)) {
		$localidad_nac_alumno = 1655;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($g_cabre1)) {
		$localidad_nac_alumno = 1656;
	}

	//H
	if (strtolower($localidad_nac_alumno) == strtolower($hernando1) || strtolower($localidad_nac_alumno) == strtolower($hernando2)) {
		$localidad_nac_alumno = 1672;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($holm1)) {
		$localidad_nac_alumno = 2056;
	}

	//I
	if (strtolower($localidad_nac_alumno) == strtolower($isla_verde1)) {
		$localidad_nac_alumno = 1685;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($idiazabal1)) {
		$localidad_nac_alumno = 1677;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($inrri1)) {
		$localidad_nac_alumno = 1681;
	}

	//J
	if (strtolower($localidad_nac_alumno) == strtolower($j_pose1)) {
		$localidad_nac_alumno = 1949;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($j_maria1) || strtolower($localidad_nac_alumno) == strtolower($j_maria2)) {
		$localidad_nac_alumno = 1688;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($j_craik1)) {
		$localidad_nac_alumno = 1573;
	}

	//L
	if (strtolower($localidad_nac_alumno) == strtolower($las_varillas1) || strtolower($localidad_nac_alumno) == strtolower($las_varillas2)) {
		$localidad_nac_alumno = 1810;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($laboulaye1)) {
		$localidad_nac_alumno = 1774;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($lomas_zamora1)) {
		$localidad_nac_alumno = 570;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($l_perdices1)) {
		$localidad_nac_alumno = 1802;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($laborde1)) {
		$localidad_nac_alumno = 1773;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($leones1)) {
		$localidad_nac_alumno = 1816;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($ll1)) {
		$localidad_nac_alumno = 1777;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($l_playo1)) {
		$localidad_nac_alumno = 1759;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($laspiur1)) {
		$localidad_nac_alumno = 1812;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($l_pozos1)) {
		$localidad_nac_alumno = 1844;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($l_carlo1)) {
		$localidad_nac_alumno = 1731;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($l_pales1)) {
		$localidad_nac_alumno = 1751;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($l_juntu1)) {
		$localidad_nac_alumno = 1795;
	}

	//M
	if (strtolower($localidad_nac_alumno) == strtolower($moron1) || strtolower($localidad_nac_alumno) == strtolower($moron2)) {
		$localidad_nac_alumno = 641;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($m_juarez1)) {
		$localidad_nac_alumno = 5441;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($morri1)) {
		$localidad_nac_alumno = 1888;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($m_buey1)) {
		$localidad_nac_alumno = 1880;
	}

	//N
	if (strtolower($localidad_nac_alumno) == strtolower($noetinger1)) {
		$localidad_nac_alumno = 1895;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($nogoya1)) {
		$localidad_nac_alumno = 2541;
	}

	//O
	if (strtolower($localidad_nac_alumno) == strtolower($oliva1)) {
		$localidad_nac_alumno = 1904;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($ordo1)) {
		$localidad_nac_alumno = 1909;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($oncativo1)) {
		$localidad_nac_alumno = 1907;
	}

	//P
	if (strtolower($localidad_nac_alumno) == strtolower($pascana1)) {
		$localidad_nac_alumno = 1918;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($p_molle1) || strtolower($localidad_nac_alumno) == strtolower($p_molle2)) {
		$localidad_nac_alumno = 1954;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($pasco1)) {
		$localidad_nac_alumno = 1919;
	}

	//R
	if (strtolower($localidad_nac_alumno) == strtolower($ramos_mejia1) || strtolower($localidad_nac_alumno) == strtolower($ramos_mejia2)) {
		$localidad_nac_alumno = 764;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($rosario1)) {
		$localidad_nac_alumno = 4761;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($r_segundo1) || strtolower($localidad_nac_alumno) == strtolower($r_segundo2)) {
		$localidad_nac_alumno = 1988;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($r_tercero1) || strtolower($localidad_nac_alumno) == strtolower($r_tercero2)) {
		$localidad_nac_alumno = 1989;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($r_cuarto1) || strtolower($localidad_nac_alumno) == strtolower($r_cuarto2)) {
		$localidad_nac_alumno = 1982;
	}

	//S
	if (strtolower($localidad_nac_alumno) == strtolower($s_m_tucu1) || strtolower($localidad_nac_alumno) == strtolower($s_m_tucu2)) {
		$localidad_nac_alumno = 5396;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($s_marcos1)) {
		$localidad_nac_alumno = 2041;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($src1)) {
		$localidad_nac_alumno = 2064;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($s_eufemia1)) {
		$localidad_nac_alumno = 2058;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($s_peli1)) {
		$localidad_nac_alumno = 1925;
	}

	//T
	if (strtolower($localidad_nac_alumno) == strtolower($tio_pujio1) || strtolower($localidad_nac_alumno) == strtolower($tio_pujio2)) {
		$localidad_nac_alumno = 2096;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($ticino1)) {
		$localidad_nac_alumno = 2093;
	}

	//U
	if (strtolower($localidad_nac_alumno) == strtolower($ucacha1)) {
		$localidad_nac_alumno = 2106;
	}

	//V
	if (strtolower($localidad_nac_alumno) == strtolower($v_d_rosario1)) {
		$localidad_nac_alumno = 2131;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($vm1) || strtolower($localidad_nac_alumno) == strtolower($vm2)) {
		$localidad_nac_alumno = 2146;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($villa_const1) || strtolower($localidad_nac_alumno) == strtolower($villa_const2)) {
		$localidad_nac_alumno = 4856;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($vn1)) {
		$localidad_nac_alumno = 2080;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($villa_rumi1)) {
		$localidad_nac_alumno = 2154;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($v_guti1)) {
		$localidad_nac_alumno = 2141;
	}




	// $cba1 = "Córdoba";
	// $cba2 = "Cordoba";
	// $cba3 = "Cba";
	// $cba4 = "Capital Córdoba";
	// $cba5 = "Capital Cordoba";

	// $bsas1 = "Bs As";
	// $bsas3 = "BsAs";
	// $bsas2 = "Buenos Aires";
	// $bsas4 = "copital";

	// $entre_rios1 = "Entre Ríos";
	// $entre_rios2 = "Entre Rios";

	// $santa_fe1 = "Santa Fé";
	// $santa_fe2 = "Santa Fe";

	// $tucuman1 = "Tucumán";
	// $tucuman2 = "Tucuman";

	// $neuquen1 = "Neuquen";

	// //PROVINCIA NACIMIENTO
	// if (strtolower($provincia_nac_alumno) == strtolower($cba1) || strtolower($provincia_nac_alumno) == strtolower($cba2) || strtolower($provincia_nac_alumno) == strtolower($cba3) || strtolower($provincia_nac_alumno) == strtolower($cba4) || strtolower($provincia_nac_alumno) == strtolower($cba5)) {
	// 	$provincia_nac_alumno = 5;
	// }

	// if (strtolower($provincia_nac_alumno) == strtolower($bsas1) || strtolower($provincia_nac_alumno) == strtolower($bsas2) || strtolower($provincia_nac_alumno) == strtolower($bsas3)) {
	// 	$provincia_nac_alumno = 1;
	// }

	// if (strtolower($provincia_nac_alumno) == strtolower($entre_rios1) || strtolower($provincia_nac_alumno) == strtolower($entre_rios2)) {
	// 	$provincia_nac_alumno = 7;
	// }

	// if (strtolower($provincia_nac_alumno) == strtolower($santa_fe1) || strtolower($provincia_nac_alumno) == strtolower($santa_fe2)) {
	// 	$provincia_nac_alumno = 20;
	// }

	// if (strtolower($provincia_nac_alumno) == strtolower($tucuman1) || strtolower($provincia_nac_alumno) == strtolower($tucuman2)) {
	// 	$provincia_nac_alumno = 23;
	// }

	// if (strtolower($provincia_nac_alumno) == strtolower($neuquen1)) {
	// 	$provincia_nac_alumno = 14;
	// }

	// //PROVINCIA TRABAJO
	// if (strtolower($provincia_trabajo_alumno) == strtolower($cba1) || strtolower($provincia_trabajo_alumno) == strtolower($cba2) || strtolower($provincia_trabajo_alumno) == strtolower($cba3) || strtolower($provincia_trabajo_alumno) == strtolower($cba4) || strtolower($provincia_trabajo_alumno) == strtolower($cba5)) {
	// 	$provincia_trabajo_alumno = 5;
	// }

	// if (strtolower($provincia_trabajo_alumno) == strtolower($bsas1) || strtolower($provincia_trabajo_alumno) == strtolower($bsas2) || strtolower($provincia_trabajo_alumno) == strtolower($bsas3) || strtolower($provincia_trabajo_alumno) == strtolower($bsas4)) {
	// 	$provincia_trabajo_alumno = 1;
	// }

	// if (strtolower($provincia_trabajo_alumno) == strtolower($entre_rios1) || strtolower($provincia_trabajo_alumno) == strtolower($entre_rios2)) {
	// 	$provincia_trabajo_alumno = 7;
	// }

	// if (strtolower($provincia_trabajo_alumno) == strtolower($santa_fe1) || strtolower($provincia_trabajo_alumno) == strtolower($santa_fe2)) {
	// 	$provincia_trabajo_alumno = 20;
	// }

	// if (strtolower($provincia_trabajo_alumno) == strtolower($tucuman1) || strtolower($provincia_trabajo_alumno) == strtolower($tucuman2)) {
	// 	$provincia_trabajo_alumno = 23;
	// }

	// if (strtolower($provincia_trabajo_alumno) == strtolower($neuquen1)) {
	// 	$provincia_trabajo_alumno = 14;
	// }

	// //PROVINCIA VIVE
	// if (strtolower($provincia_viviendo_alumno) == strtolower($cba1) || strtolower($provincia_viviendo_alumno) == strtolower($cba2) || strtolower($provincia_viviendo_alumno) == strtolower($cba3) || strtolower($provincia_viviendo_alumno) == strtolower($cba4) || strtolower($provincia_viviendo_alumno) == strtolower($cba5)) {
	// 	$provincia_viviendo_alumno = 5;
	// }

	// if (strtolower($provincia_viviendo_alumno) == strtolower($bsas1) || strtolower($provincia_viviendo_alumno) == strtolower($bsas2) || strtolower($provincia_viviendo_alumno) == strtolower($bsas3)) {
	// 	$provincia_viviendo_alumno = 1;
	// }

	// if (strtolower($provincia_viviendo_alumno) == strtolower($entre_rios1) || strtolower($provincia_viviendo_alumno) == strtolower($entre_rios2)) {
	// 	$provincia_viviendo_alumno = 7;
	// }

	// if (strtolower($provincia_viviendo_alumno) == strtolower($santa_fe1) || strtolower($provincia_viviendo_alumno) == strtolower($santa_fe2)) {
	// 	$provincia_viviendo_alumno = 20;
	// }

	// if (strtolower($provincia_viviendo_alumno) == strtolower($tucuman1) || strtolower($provincia_viviendo_alumno) == strtolower($tucuman2)) {
	// 	$provincia_viviendo_alumno = 23;
	// }

	// if (strtolower($provincia_viviendo_alumno) == strtolower($neuquen1)) {
	// 	$provincia_viviendo_alumno = 14;
	// }

	// echo 'prov. nac: '.$provincia_nac_alumno.'<br>';
	// echo 'prov. trab: '.$provincia_trabajo_alumno.'<br>';
	// echo 'prov. vive: '.$provincia_viviendo_alumno.'<br>';

//'".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$numerocalle_alumno."','".$gra_depto."','".$gra_piso."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$provincia_nac_alumno."','".$localidad_nac_alumno."','".$provincia_trabajo_alumno."','".$localidad_trabajo_alumno."','".$provincia_viviendo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."'

	//$gra_sql .= "INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,facebook_alumno,numerodni_alumno,tipodni_alumno,foto_alumno,carrera_alumno,ancho_final,alto_final,fechanacimiento_alumno,numerocalle_alumno,gra_depto,gra_piso,mail_alumno,mail_alumno2,twitter_alumno,provincia_nac_alumno,localidad_nac_alumno,provincia_trabajo_alumno,localidad_trabajo_alumno,provincia_viviendo_alumno,localidad_viviendo_alumno,perfilacademico_alumno,perfil_laboral_alumno) VALUES ('".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$numerocalle_alumno."','".$gra_depto."','".$gra_piso."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$provincia_nac_alumno."','".$localidad_nac_alumno."','".$provincia_trabajo_alumno."','".$localidad_trabajo_alumno."','".$provincia_viviendo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."');<br>";
	$gra_sql .= "INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,facebook_alumno,numerodni_alumno,tipodni_alumno,foto_alumno,carrera_alumno,ancho_final,alto_final,fechanacimiento_alumno,numerocalle_alumno,mail_alumno,mail_alumno2,twitter_alumno,provincia_nac_alumno,localidad_nac_alumno,provincia_trabajo_alumno,localidad_trabajo_alumno,provincia_viviendo_alumno,localidad_viviendo_alumno,perfilacademico_alumno,perfil_laboral_alumno) VALUES ('".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$numerocalle_alumno."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$provincia_nac_alumno."','".$localidad_nac_alumno."','".$provincia_trabajo_alumno."','".$localidad_trabajo_alumno."','".$provincia_viviendo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."');<br>";
}


//include_once("conexionCursoExtension.php");
echo $gra_sql;

include_once "cerrar_conn.php";
?>