<meta charset="UTF-8" />
<?php

function setDate2($f){
    $vF = explode('-', $f);
    //return $vF[2].'/'.$vF[1].'/'.$vF[0];
    return $vF[2].$vF[1].$vF[0];
}


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

	if (strlen(trim($rowGrad['ancho_final'])) > 5) {
		$ancho_final = '600';
	}else{
		$ancho_final = trim($rowGrad['ancho_final']);
	}

	if (strlen(trim($rowGrad['alto_final'])) > 5) {
		$alto_final = '600';
	}else{
		$alto_final = trim($rowGrad['alto_final']);
	}	
	if ($rowGrad['fechanacimiento_alumno'] <> ''){
		$fechanacimiento_alumno = setDate2(trim($rowGrad['fechanacimiento_alumno']));
	}else{
		$fechanacimiento_alumno = trim($rowGrad['fechanacimiento_alumno']);
	}
	$calle_alumno = ucwords(trim($rowGrad['calle_alumno']));
	$numerocalle_alumno = trim($rowGrad['numerocalle_alumno']);
	//$gra_depto = trim($rowGrad['gra_depto']);
	//$gra_piso = trim($rowGrad['gra_piso']);
	$mail_alumno = trim($rowGrad['mail_alumno']);
	$mail_alumno2 = trim($rowGrad['mail_alumno2']);
	$twitter_alumno = trim($rowGrad['twitter_alumno']);
	if (trim($rowGrad['localidad_nac_alumno']) == ''){
		$localidad_nac_alumno = 0;
	}else{
		$localidad_nac_alumno = trim($rowGrad['localidad_nac_alumno']);
	}

	if (trim($rowGrad['localidad_trabajo_alumno']) == ''){
		$localidad_trabajo_alumno = 0;
	}else{
		$localidad_trabajo_alumno = trim($rowGrad['localidad_trabajo_alumno']);
	}

	if (trim($rowGrad['localidad_viviendo_alumno']) == ''){
		$localidad_viviendo_alumno = 0;
	}else{
		$localidad_viviendo_alumno = trim($rowGrad['localidad_viviendo_alumno']);
	}
	$perfilacademico_alumno = ucfirst(trim($rowGrad['perfilacademico_alumno']));
	$perfil_laboral_alumno = ucfirst(trim($rowGrad['perfil_laboral_alumno']));

	$a_cabral1 = "Arroyo cabral";
	$alicia1 = "Alicia";
	$a_algodon1 = "Arroyo Algodon";
	$a_algodon2 = "Arroyo Algodón";
	$alma1 = "Almafuerte";
	$ausonia1 = "Ausonia";
	$arrecifes1 = "Arrecifes";
	$alsina1 = "Valentin Alsina";
	$a_alegre1 = "Alto Alegre";
	$armstrong1 = "Armstrog";

	$bs_as1 = "Capital Federal";
	$bs_as2 = "bs as";
	$bs_as3 = "Ciudad Autonoma de Buenos Aires";
	$bs_as4 = "CABA";
	$bs_as5 = "Ciudad Aut. De Buenos Aires";
	$bs_as6 = "Cap. Federal";
	$bs_as7 = "Caballito";
	$bs_as8 = "BsAs";
	$bell_ville1 = "Bell Ville";
	$bell_ville2 = "Bell Vill";
	$ballesteros1 = "Ballesteros";
	$ballesteros_sud1 = "Ballesteros Sud";
	$bragado1 = "Bragado";
	$benavidez1 = "Benavidez";
	$boulogne1 = "Boulogne";
	$balnearia1 = "Balnearia";
	$baradero1 = "Baradero";

	$carrilobo1 = "Carrilobo";
	$cba1 = "Córdoba";
	$cba2 = "Cordoba";
	$cba3 = "Cba";
	$cba4 = "Capital Córdoba";
	$cba5 = "Capital Cordoba";
	$cba6 = "capital";
	$cba7 = "Córdoba Capital";
	$canals1 = "Canals";
	$c_marina1 = "Colonia Marina";
	$chili1 = "Chilibroste";
	$chazon1 = "Chazón";
	$c_d_bustos1 = "Corral de Bustos";
	$c_oeste1 = "Calchin Oeste";
	$castelar1 = "Castelar";
	$chivil1 = "Chivilcoy";
	$caseros1 = "Caseros";
	$c_alta1 = "Cruz Alta";
	$cintra1 = "Cintra";

	$dean_funes1 = "Dean Funes";
	$dean_funes2 = "Dean Funez";
	$dean_funes3 = "Deán Funez";
	$dean_funes4 = "Deán Funes";
	$dean_funes5 = "Deam Funes";

	$e_aranado1 = "El Arañado";
	$embalse1 = "Embalse";
	$etruria1 = "Etruria";

	$fray_l_b1 = "Fray Luis Beltran";

	$g_deheza1 = "Gral Deheza";
	$g_deheza2 = "General Deheza";
	$g_lavalle1 = "General Lavalle";
	$g_baldi1 = "Gral Baldisera";
	$g_baldi2 = "General Baldissera";
	$g_cabre1 = "General Cabrera";
	$g_cabre2 = "Gral Cabrera";

	$hernando1 = "Herenando";
	$hernando2 = "Hernando";
	$holm1 = "Holmberg";
	$haedo1 = "Haedo";
	$huelva1 = "Huelva";

	$isla_verde1 = "Isla verde";
	$idiazabal1 = "Idiazabal";
	$inrri1 = "Inriville";
	$i_casanova1 = "Isidro Casanova";

	$j_pose1 = "Justiniano Posse";
	$j_maria1 = "Jesus Maria";
	$j_maria2 = "Jesus María";
	$j_craik1 = "James craik";
	$j_craik2 = "Jame craik";
	$j_c_paz1 = "Jose C. Paz";
	$junin1 = "Junin";

	$las_varillas1 = "Las Varillas";
	$las_varillas2 = "Las Varillas ";
	$las_varillas3 = "Las Varias";
	$l_perdices1 = "Las Perdices";
	$laborde1 = "Laborde";
	$l_playo1 = "La Playosa";
	$l_carlo1 = "La Carlota";
	$l_calera1 = "La Calera";

	$laboulaye1 = "Laboulaye";
	$lomas_zamora1 = "Lomas de Zamora";
	$leones1 = "Leones";
	$ll1 = "Laguna Larga";
	$laspiur1 = "Laspiur";
	$l_pozos1 = "Los Pozos";
	$l_pales1 = "La Palestina";
	$l_juntu1 = "Las Junturas";
	$l_plata1 = "La Plata";
	$lanus1 = "Lanús Oeste";
	$l_flores1 = "Flores";
	$luque1 = "Luque";
	$lincoln1 = "Lincoln";

	$moron1 = "MORON";
	$moron2 = "morón";
	$m_juarez1 = "Marcos Juarez";
	$m_juarez2 = "Marco Juarez";
	$morri1 = "Morrison";
	$m_buey1 = "Monte Buey";
	$martinez1 = "Martinez";
	$merlo1 = "Merlo";
	$m_coronado1 = "Martín Colorado";
	$m_coronado2 = "Martin Colorado";

	$noetinger1 = "Noetinger";
	$nogoya1 = "Nogoya";
	$neuquen1 = "Neuquen";

	$oliva1 = "Oliva";
	$ordo1 = "Ordoñez";
	$oncativo1 = "Oncativo";
	$olivos1 = "Olivos";

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
	$serrano1 = "Serrano";
	$s_rosa_pri1 = "Santa Rosa de Rio Primero";
	$s_rosa_pri2 = "Santa Rosa de Río Primero";
	$s_espiritu1 = "Sancti Spiritu";
	$saladillo1 = "Saladillo";
	$s_miguel1 = "San Miguel";
	$sarandi1 = "Sarandi";
	$saira1 = "Saira";

	$tio_pujio1 = "Tio Pujio";
	$tio_pujio2 = "Tío Pujio";
	$ticino1 = "Ticino";
	$tapiales1 = "Tapiales";

	$ucacha1 = "Ucacha";

	$v_d_rosario1 = "Villa del Rosario";
	$vm1 = "Villa María";
	$vm2 = "Villa Maria";
	$vm3 = "VILLA MARÍA";
	$vn1 = "Villa Nueva";
	$villa_const1 = "Villa Constitución";
	$villa_const2 = "Villa Constitucion";
	$villa_rumi1 = "Villa Rumipal";
	$v_guti1 = "Villa Gutierrez";
	$v_tuerto1 = "Venado Tuerto";
	$v_tulumba1 = "vVilla Tulumba";

	$c25_d_mayo1 = "25 de Mayo";


	$mc = "Martin Coronel";
	$vm4 = "VILLA MARÍA";
	$vo = "Villa Oliva";
	$n = "Nuñez";

	if (strtolower($localidad_nac_alumno) == strtolower($mc) || strtolower($localidad_nac_alumno) == strtolower($vm4) || strtolower($localidad_nac_alumno) == strtolower($vo) || strtolower($localidad_nac_alumno) == strtolower($n)) {
		$localidad_nac_alumno = 0;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($mc) || strtolower($localidad_trabajo_alumno) == strtolower($vm4) || strtolower($localidad_trabajo_alumno) == strtolower($vo) || strtolower($localidad_trabajo_alumno) == strtolower($n)) {
		$localidad_trabajo_alumno = 0;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($mc) || strtolower($localidad_viviendo_alumno) == strtolower($vm4) || strtolower($localidad_viviendo_alumno) == strtolower($vo) || strtolower($localidad_viviendo_alumno) == strtolower($n)) {
		$localidad_viviendo_alumno = 0;
	}
	//LOCALIDAD NACIMIENTO

	//#
	if (strtolower($localidad_nac_alumno) == strtolower($c25_d_mayo1)) {
		$localidad_nac_alumno = 5;
	}

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
	if (strtolower($localidad_nac_alumno) == strtolower($arrecifes1)) {
		$localidad_nac_alumno = 66;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($alsina1)) {
		$localidad_nac_alumno = 38;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($a_alegre1)) {
		$localidad_nac_alumno = 1423;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($armstrong1)) {
		$localidad_nac_alumno = 4435;
	}

	//B
	if (strtolower($localidad_nac_alumno) == strtolower($bs_as1) || strtolower($localidad_nac_alumno) == strtolower($bs_as2) || strtolower($localidad_nac_alumno) == strtolower($bs_as3) || strtolower($localidad_nac_alumno) == strtolower($bs_as4) || strtolower($localidad_nac_alumno) == strtolower($bs_as5) || strtolower($localidad_nac_alumno) == strtolower($bs_as6) || strtolower($localidad_nac_alumno) == strtolower($bs_as7) || strtolower($localidad_nac_alumno) == strtolower($bs_as8)) {
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
	if (strtolower($localidad_nac_alumno) == strtolower($bragado1)) {
		$localidad_nac_alumno = 142;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($benavidez1)) {
		$localidad_nac_alumno = 120;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($boulogne1)) {
		$localidad_nac_alumno = 141;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($balnearia1)) {
		$localidad_nac_alumno = 1447;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($baradero1)) {
		$localidad_nac_alumno = 104;
	}

	//C
	if (strtolower($localidad_nac_alumno) == strtolower($carrilobo1)) {
		$localidad_nac_alumno = 1500;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($cba1) || strtolower($localidad_nac_alumno) == strtolower($cba2) || strtolower($localidad_nac_alumno) == strtolower($cba3) || strtolower($localidad_nac_alumno) == strtolower($cba4) || strtolower($localidad_nac_alumno) == strtolower($cba5) || strtolower($localidad_nac_alumno) == strtolower($cba6) || strtolower($localidad_nac_alumno) == strtolower($cba7)) {
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
	if (strtolower($localidad_nac_alumno) == strtolower($castelar1)) {
		$localidad_nac_alumno = 185;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($chivil1)) {
		$localidad_nac_alumno = 202;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($caseros1)) {
		$localidad_nac_alumno = 183;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($c_alta1)) {
		$localidad_nac_alumno = 1574;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($cintra1)) {
		$localidad_nac_alumno = 1529;
	}

	//D
	if (strtolower($localidad_nac_alumno) == strtolower($dean_funes1) || strtolower($localidad_nac_alumno) == strtolower($dean_funes2) || strtolower($localidad_nac_alumno) == strtolower($dean_funes3) || strtolower($localidad_nac_alumno) == strtolower($dean_funes4) || strtolower($localidad_nac_alumno) == strtolower($dean_funes5)) {
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

	//F
	if (strtolower($localidad_nac_alumno) == strtolower($fray_l_b1)) {
		$localidad_nac_alumno = 4567;
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
	if (strtolower($localidad_nac_alumno) == strtolower($g_cabre1) || strtolower($localidad_nac_alumno) == strtolower($g_cabre2)) {
		$localidad_nac_alumno = 1656;
	}

	//H
	if (strtolower($localidad_nac_alumno) == strtolower($hernando1) || strtolower($localidad_nac_alumno) == strtolower($hernando2)) {
		$localidad_nac_alumno = 1672;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($holm1)) {
		$localidad_nac_alumno = 2056;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($haedo1)) {
		$localidad_nac_alumno = 420;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($huelva1)) {
		$localidad_nac_alumno = 0;
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
	if (strtolower($localidad_nac_alumno) == strtolower($i_casanova1)) {
		$localidad_nac_alumno = 176;
	}

	//J
	if (strtolower($localidad_nac_alumno) == strtolower($j_pose1)) {
		$localidad_nac_alumno = 1949;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($j_maria1) || strtolower($localidad_nac_alumno) == strtolower($j_maria2)) {
		$localidad_nac_alumno = 1688;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($j_craik1) || strtolower($localidad_nac_alumno) == strtolower($j_craik2)) {
		$localidad_nac_alumno = 1573;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($j_c_paz1)) {
		$localidad_nac_alumno = 699;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($junin1)) {
		$localidad_nac_alumno = 466;
	}

	//L
	if (strtolower($localidad_nac_alumno) == strtolower($las_varillas1) || strtolower($localidad_nac_alumno) == strtolower($las_varillas2) || strtolower($localidad_nac_alumno) == strtolower($las_varillas3)) {
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
	if (strtolower($localidad_nac_alumno) == strtolower($l_plata1)) {
		$localidad_nac_alumno = 513;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($lanus1)) {
		$localidad_nac_alumno = 532;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($l_flores1)) {
		$localidad_nac_alumno = 540;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($l_calera1)) {
		$localidad_nac_alumno = 1728;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($luque1)) {
		$localidad_nac_alumno = 1855;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($lincoln1)) {
		$localidad_nac_alumno = 563;
	}

	//M
	if (strtolower($localidad_nac_alumno) == strtolower($moron1) || strtolower($localidad_nac_alumno) == strtolower($moron2)) {
		$localidad_nac_alumno = 641;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($m_juarez1) || strtolower($localidad_nac_alumno) == strtolower($m_juarez2)) {
		$localidad_nac_alumno = 1690;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($morri1)) {
		$localidad_nac_alumno = 1888;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($m_buey1)) {
		$localidad_nac_alumno = 1880;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($martinez1)) {
		$localidad_nac_alumno = 607;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($merlo1)) {
		$localidad_nac_alumno = 617;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($m_coronado1) || strtolower($localidad_nac_alumno) == strtolower($m_coronado2)) {
		$localidad_nac_alumno = 229;
	}

	//N
	if (strtolower($localidad_nac_alumno) == strtolower($noetinger1)) {
		$localidad_nac_alumno = 1895;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($nogoya1)) {
		$localidad_nac_alumno = 2541;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($neuquen1)) {
		$localidad_nac_alumno = 3560;
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
	if (strtolower($localidad_nac_alumno) == strtolower($olivos1)) {
		$localidad_nac_alumno = 673;
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
	if (strtolower($localidad_nac_alumno) == strtolower($serrano1)) {
		$localidad_nac_alumno = 2072;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($s_rosa_pri1) || strtolower($localidad_nac_alumno) == strtolower($s_rosa_pri2)) {
		$localidad_nac_alumno = 2065;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($s_espiritu1)) {
		$localidad_nac_alumno = 4802;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($saladillo1)) {
		$localidad_nac_alumno = 798;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($s_miguel1)) {
		$localidad_nac_alumno = 833;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($sarandi1)) {
		$localidad_nac_alumno = 859;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($saira1)) {
		$localidad_nac_alumno = 2002;
	}

	//T
	if (strtolower($localidad_nac_alumno) == strtolower($tio_pujio1) || strtolower($localidad_nac_alumno) == strtolower($tio_pujio2)) {
		$localidad_nac_alumno = 2096;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($ticino1)) {
		$localidad_nac_alumno = 2093;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($tapiales1)) {
		$localidad_nac_alumno = 889;
	}

	//U
	if (strtolower($localidad_nac_alumno) == strtolower($ucacha1)) {
		$localidad_nac_alumno = 2106;
	}

	//V
	if (strtolower($localidad_nac_alumno) == strtolower($v_d_rosario1)) {
		$localidad_nac_alumno = 2131;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($vm1) || strtolower($localidad_nac_alumno) == strtolower($vm2) || strtolower($localidad_nac_alumno) == strtolower($vm3)) {
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
	if (strtolower($localidad_nac_alumno) == strtolower($v_tuerto1)) {
		$localidad_nac_alumno = 4846;
	}
	if (strtolower($localidad_nac_alumno) == strtolower($v_tulumba1)) {
		$localidad_nac_alumno = 2158;
	}

//LOCALIDAD TRABAJO

	//#
	if (strtolower($localidad_trabajo_alumno) == strtolower($c25_d_mayo1)) {
		$localidad_trabajo_alumno = 5;
	}

	//A
	if (strtolower($localidad_trabajo_alumno) == strtolower($a_cabral1)) {
		$localidad_trabajo_alumno = 1436;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($alicia1)) {
		$localidad_trabajo_alumno = 1416;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($a_algodon1) || strtolower($localidad_trabajo_alumno) == strtolower($a_algodon2)) {
		$localidad_trabajo_alumno = 1435;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($alma1)) {
		$localidad_trabajo_alumno = 1417;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($ausonia1)) {
		$localidad_trabajo_alumno = 1441;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($arrecifes1)) {
		$localidad_trabajo_alumno = 66;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($alsina1)) {
		$localidad_trabajo_alumno = 38;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($a_alegre1)) {
		$localidad_trabajo_alumno = 1423;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($armstrong1)) {
		$localidad_trabajo_alumno = 4435;
	}

	//B
	if (strtolower($localidad_trabajo_alumno) == strtolower($bs_as1) || strtolower($localidad_trabajo_alumno) == strtolower($bs_as2) || strtolower($localidad_trabajo_alumno) == strtolower($bs_as3) || strtolower($localidad_trabajo_alumno) == strtolower($bs_as4) || strtolower($localidad_trabajo_alumno) == strtolower($bs_as5) || strtolower($localidad_trabajo_alumno) == strtolower($bs_as6) || strtolower($localidad_trabajo_alumno) == strtolower($bs_as7) || strtolower($localidad_trabajo_alumno) == strtolower($bs_as8)) {
		$localidad_trabajo_alumno = 5440;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($bell_ville1) || strtolower($localidad_trabajo_alumno) == strtolower($bell_ville2)) {
		$localidad_trabajo_alumno = 1452;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($ballesteros1)) {
		$localidad_trabajo_alumno = 1445;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($ballesteros_sud1)) {
		$localidad_trabajo_alumno = 1446;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($bragado1)) {
		$localidad_trabajo_alumno = 142;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($benavidez1)) {
		$localidad_trabajo_alumno = 120;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($boulogne1)) {
		$localidad_trabajo_alumno = 141;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($balnearia1)) {
		$localidad_trabajo_alumno = 1447;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($baradero1)) {
		$localidad_trabajo_alumno = 104;
	}

	//C
	if (strtolower($localidad_trabajo_alumno) == strtolower($carrilobo1)) {
		$localidad_trabajo_alumno = 1500;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($cba1) || strtolower($localidad_trabajo_alumno) == strtolower($cba2) || strtolower($localidad_trabajo_alumno) == strtolower($cba3) || strtolower($localidad_trabajo_alumno) == strtolower($cba4) || strtolower($localidad_trabajo_alumno) == strtolower($cba5) || strtolower($localidad_trabajo_alumno) == strtolower($cba6) || strtolower($localidad_trabajo_alumno) == strtolower($cba7)) {
		$localidad_trabajo_alumno = 1560;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($canals1)) {
		$localidad_trabajo_alumno = 1483;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($c_marina1)) {
		$localidad_trabajo_alumno = 1545;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($chili1)) {
		$localidad_trabajo_alumno = 1520;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($chazon1)) {
		$localidad_trabajo_alumno = 1519;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($c_d_bustos1)) {
		$localidad_trabajo_alumno = 1565;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($c_oeste1)) {
		$localidad_trabajo_alumno = 1470;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($castelar1)) {
		$localidad_trabajo_alumno = 185;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($chivil1)) {
		$localidad_trabajo_alumno = 202;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($caseros1)) {
		$localidad_trabajo_alumno = 183;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($c_alta1)) {
		$localidad_trabajo_alumno = 1574;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($cintra1)) {
		$localidad_trabajo_alumno = 1529;
	}

	//D
	if (strtolower($localidad_trabajo_alumno) == strtolower($dean_funes1) || strtolower($localidad_trabajo_alumno) == strtolower($dean_funes2) || strtolower($localidad_trabajo_alumno) == strtolower($dean_funes3) || strtolower($localidad_trabajo_alumno) == strtolower($dean_funes4) || strtolower($localidad_trabajo_alumno) == strtolower($dean_funes5)) {
		$localidad_trabajo_alumno = 1589;
	}
	
	//E
	if (strtolower($localidad_trabajo_alumno) == strtolower($e_aranado1)) {
		$localidad_trabajo_alumno = 1597;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($embalse1)) {
		$localidad_trabajo_alumno = 1637;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($etruria1)) {
		$localidad_trabajo_alumno = 1644;
	}

	//F
	if (strtolower($localidad_trabajo_alumno) == strtolower($fray_l_b1)) {
		$localidad_trabajo_alumno = 4567;
	}

	//G
	if (strtolower($localidad_trabajo_alumno) == strtolower($g_deheza1) || strtolower($localidad_trabajo_alumno) == strtolower($g_deheza2)) {
		$localidad_trabajo_alumno = 1657;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($g_lavalle1)) {
		$localidad_trabajo_alumno = 1659;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($g_baldi1) || strtolower($localidad_trabajo_alumno) == strtolower($g_baldi2)) {
		$localidad_trabajo_alumno = 1655;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($g_cabre1) || strtolower($localidad_trabajo_alumno) == strtolower($g_cabre2)) {
		$localidad_trabajo_alumno = 1656;
	}

	//H
	if (strtolower($localidad_trabajo_alumno) == strtolower($hernando1) || strtolower($localidad_trabajo_alumno) == strtolower($hernando2)) {
		$localidad_trabajo_alumno = 1672;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($holm1)) {
		$localidad_trabajo_alumno = 2056;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($haedo1)) {
		$localidad_trabajo_alumno = 420;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($huelva1)) {
		$localidad_trabajo_alumno = 0;
	}

	//I
	if (strtolower($localidad_trabajo_alumno) == strtolower($isla_verde1)) {
		$localidad_trabajo_alumno = 1685;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($idiazabal1)) {
		$localidad_trabajo_alumno = 1677;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($inrri1)) {
		$localidad_trabajo_alumno = 1681;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($i_casanova1)) {
		$localidad_trabajo_alumno = 176;
	}

	//J
	if (strtolower($localidad_trabajo_alumno) == strtolower($j_pose1)) {
		$localidad_trabajo_alumno = 1949;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($j_maria1) || strtolower($localidad_trabajo_alumno) == strtolower($j_maria2)) {
		$localidad_trabajo_alumno = 1688;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($j_craik1) || strtolower($localidad_trabajo_alumno) == strtolower($j_craik2)) {
		$localidad_trabajo_alumno = 1573;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($j_c_paz1)) {
		$localidad_trabajo_alumno = 699;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($junin1)) {
		$localidad_trabajo_alumno = 466;
	}

	//L
	if (strtolower($localidad_trabajo_alumno) == strtolower($las_varillas1) || strtolower($localidad_trabajo_alumno) == strtolower($las_varillas2) || strtolower($localidad_trabajo_alumno) == strtolower($las_varillas3)) {
		$localidad_trabajo_alumno = 1810;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($laboulaye1)) {
		$localidad_trabajo_alumno = 1774;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($lomas_zamora1)) {
		$localidad_trabajo_alumno = 570;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_perdices1)) {
		$localidad_trabajo_alumno = 1802;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($laborde1)) {
		$localidad_trabajo_alumno = 1773;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($leones1)) {
		$localidad_trabajo_alumno = 1816;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($ll1)) {
		$localidad_trabajo_alumno = 1777;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_playo1)) {
		$localidad_trabajo_alumno = 1759;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($laspiur1)) {
		$localidad_trabajo_alumno = 1812;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_pozos1)) {
		$localidad_trabajo_alumno = 1844;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_carlo1)) {
		$localidad_trabajo_alumno = 1731;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_pales1)) {
		$localidad_trabajo_alumno = 1751;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_juntu1)) {
		$localidad_trabajo_alumno = 1795;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_plata1)) {
		$localidad_trabajo_alumno = 513;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($lanus1)) {
		$localidad_trabajo_alumno = 532;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_flores1)) {
		$localidad_trabajo_alumno = 540;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($l_calera1)) {
		$localidad_trabajo_alumno = 1728;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($luque1)) {
		$localidad_trabajo_alumno = 1855;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($lincoln1)) {
		$localidad_trabajo_alumno = 563;
	}

	//M
	if (strtolower($localidad_trabajo_alumno) == strtolower($moron1) || strtolower($localidad_trabajo_alumno) == strtolower($moron2)) {
		$localidad_trabajo_alumno = 641;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($m_juarez1) || strtolower($localidad_trabajo_alumno) == strtolower($m_juarez2)) {
		$localidad_trabajo_alumno = 1690;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($morri1)) {
		$localidad_trabajo_alumno = 1888;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($m_buey1)) {
		$localidad_trabajo_alumno = 1880;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($martinez1)) {
		$localidad_trabajo_alumno = 607;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($merlo1)) {
		$localidad_trabajo_alumno = 617;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($m_coronado1) || strtolower($localidad_trabajo_alumno) == strtolower($m_coronado2)) {
		$localidad_trabajo_alumno = 229;
	}

	//N
	if (strtolower($localidad_trabajo_alumno) == strtolower($noetinger1)) {
		$localidad_trabajo_alumno = 1895;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($nogoya1)) {
		$localidad_trabajo_alumno = 2541;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($neuquen1)) {
		$localidad_trabajo_alumno = 3560;
	}

	//O
	if (strtolower($localidad_trabajo_alumno) == strtolower($oliva1)) {
		$localidad_trabajo_alumno = 1904;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($ordo1)) {
		$localidad_trabajo_alumno = 1909;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($oncativo1)) {
		$localidad_trabajo_alumno = 1907;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($olivos1)) {
		$localidad_trabajo_alumno = 673;
	}

	//P
	if (strtolower($localidad_trabajo_alumno) == strtolower($pascana1)) {
		$localidad_trabajo_alumno = 1918;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($p_molle1) || strtolower($localidad_trabajo_alumno) == strtolower($p_molle2)) {
		$localidad_trabajo_alumno = 1954;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($pasco1)) {
		$localidad_trabajo_alumno = 1919;
	}

	//R
	if (strtolower($localidad_trabajo_alumno) == strtolower($ramos_mejia1) || strtolower($localidad_trabajo_alumno) == strtolower($ramos_mejia2)) {
		$localidad_trabajo_alumno = 764;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($rosario1)) {
		$localidad_trabajo_alumno = 4761;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($r_segundo1) || strtolower($localidad_trabajo_alumno) == strtolower($r_segundo2)) {
		$localidad_trabajo_alumno = 1988;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($r_tercero1) || strtolower($localidad_trabajo_alumno) == strtolower($r_tercero2)) {
		$localidad_trabajo_alumno = 1989;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($r_cuarto1) || strtolower($localidad_trabajo_alumno) == strtolower($r_cuarto2)) {
		$localidad_trabajo_alumno = 1982;
	}

	//S
	if (strtolower($localidad_trabajo_alumno) == strtolower($s_m_tucu1) || strtolower($localidad_trabajo_alumno) == strtolower($s_m_tucu2)) {
		$localidad_trabajo_alumno = 5396;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($s_marcos1)) {
		$localidad_trabajo_alumno = 2041;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($src1)) {
		$localidad_trabajo_alumno = 2064;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($s_eufemia1)) {
		$localidad_trabajo_alumno = 2058;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($s_peli1)) {
		$localidad_trabajo_alumno = 1925;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($serrano1)) {
		$localidad_trabajo_alumno = 2072;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($s_rosa_pri1) || strtolower($localidad_trabajo_alumno) == strtolower($s_rosa_pri2)) {
		$localidad_trabajo_alumno = 2065;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($s_espiritu1)) {
		$localidad_trabajo_alumno = 4802;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($saladillo1)) {
		$localidad_trabajo_alumno = 798;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($s_miguel1)) {
		$localidad_trabajo_alumno = 833;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($sarandi1)) {
		$localidad_trabajo_alumno = 859;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($saira1)) {
		$localidad_trabajo_alumno = 2002;
	}

	//T
	if (strtolower($localidad_trabajo_alumno) == strtolower($tio_pujio1) || strtolower($localidad_trabajo_alumno) == strtolower($tio_pujio2)) {
		$localidad_trabajo_alumno = 2096;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($ticino1)) {
		$localidad_trabajo_alumno = 2093;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($tapiales1)) {
		$localidad_trabajo_alumno = 889;
	}

	//U
	if (strtolower($localidad_trabajo_alumno) == strtolower($ucacha1)) {
		$localidad_trabajo_alumno = 2106;
	}

	//V
	if (strtolower($localidad_trabajo_alumno) == strtolower($v_d_rosario1)) {
		$localidad_trabajo_alumno = 2131;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($vm1) || strtolower($localidad_trabajo_alumno) == strtolower($vm2)) {
		$localidad_trabajo_alumno = 2146;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($villa_const1) || strtolower($localidad_trabajo_alumno) == strtolower($villa_const2) || strtolower($localidad_trabajo_alumno) == strtolower($villa_const3)) {
		$localidad_trabajo_alumno = 4856;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($vn1)) {
		$localidad_trabajo_alumno = 2080;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($villa_rumi1)) {
		$localidad_trabajo_alumno = 2154;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($v_guti1)) {
		$localidad_trabajo_alumno = 2141;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($v_tuerto1)) {
		$localidad_trabajo_alumno = 4846;
	}
	if (strtolower($localidad_trabajo_alumno) == strtolower($v_tulumba1)) {
		$localidad_trabajo_alumno = 2158;
	}


//LOCALIDAD VIVIENDO

	//#
	if (strtolower($localidad_viviendo_alumno) == strtolower($c25_d_mayo1)) {
		$localidad_viviendo_alumno = 5;
	}

	//A
	if (strtolower($localidad_viviendo_alumno) == strtolower($a_cabral1)) {
		$localidad_viviendo_alumno = 1436;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($alicia1)) {
		$localidad_viviendo_alumno = 1416;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($a_algodon1) || strtolower($localidad_viviendo_alumno) == strtolower($a_algodon2)) {
		$localidad_viviendo_alumno = 1435;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($alma1)) {
		$localidad_viviendo_alumno = 1417;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($ausonia1)) {
		$localidad_viviendo_alumno = 1441;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($arrecifes1)) {
		$localidad_viviendo_alumno = 66;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($alsina1)) {
		$localidad_viviendo_alumno = 38;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($a_alegre1)) {
		$localidad_viviendo_alumno = 1423;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($armstrong1)) {
		$localidad_viviendo_alumno = 4435;
	}

	//B
	if (strtolower($localidad_viviendo_alumno) == strtolower($bs_as1) || strtolower($localidad_viviendo_alumno) == strtolower($bs_as2) || strtolower($localidad_viviendo_alumno) == strtolower($bs_as3) || strtolower($localidad_viviendo_alumno) == strtolower($bs_as4) || strtolower($localidad_viviendo_alumno) == strtolower($bs_as5) || strtolower($localidad_viviendo_alumno) == strtolower($bs_as6) || strtolower($localidad_viviendo_alumno) == strtolower($bs_as7) || strtolower($localidad_viviendo_alumno) == strtolower($bs_as8)) {
		$localidad_viviendo_alumno = 5440;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($bell_ville1) || strtolower($localidad_viviendo_alumno) == strtolower($bell_ville2)) {
		$localidad_viviendo_alumno = 1452;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($ballesteros1)) {
		$localidad_viviendo_alumno = 1445;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($ballesteros_sud1)) {
		$localidad_viviendo_alumno = 1446;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($bragado1)) {
		$localidad_viviendo_alumno = 142;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($benavidez1)) {
		$localidad_viviendo_alumno = 120;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($boulogne1)) {
		$localidad_viviendo_alumno = 141;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($balnearia1)) {
		$localidad_viviendo_alumno = 1447;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($baradero1)) {
		$localidad_viviendo_alumno = 104;
	}

	//C
	if (strtolower($localidad_viviendo_alumno) == strtolower($carrilobo1)) {
		$localidad_viviendo_alumno = 1500;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($cba1) || strtolower($localidad_viviendo_alumno) == strtolower($cba2) || strtolower($localidad_viviendo_alumno) == strtolower($cba3) || strtolower($localidad_viviendo_alumno) == strtolower($cba4) || strtolower($localidad_viviendo_alumno) == strtolower($cba5) || strtolower($localidad_viviendo_alumno) == strtolower($cba6) || strtolower($localidad_viviendo_alumno) == strtolower($cba7)) {
		$localidad_viviendo_alumno = 1560;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($canals1)) {
		$localidad_viviendo_alumno = 1483;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($c_marina1)) {
		$localidad_viviendo_alumno = 1545;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($chili1)) {
		$localidad_viviendo_alumno = 1520;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($chazon1)) {
		$localidad_viviendo_alumno = 1519;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($c_d_bustos1)) {
		$localidad_viviendo_alumno = 1565;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($c_oeste1)) {
		$localidad_viviendo_alumno = 1470;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($castelar1)) {
		$localidad_viviendo_alumno = 185;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($chivil1)) {
		$localidad_viviendo_alumno = 202;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($caseros1)) {
		$localidad_viviendo_alumno = 183;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($c_alta1)) {
		$localidad_viviendo_alumno = 1574;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($cintra1)) {
		$localidad_viviendo_alumno = 1529;
	}

	//D
	if (strtolower($localidad_viviendo_alumno) == strtolower($dean_funes1) || strtolower($localidad_viviendo_alumno) == strtolower($dean_funes2) || strtolower($localidad_viviendo_alumno) == strtolower($dean_funes3) || strtolower($localidad_viviendo_alumno) == strtolower($dean_funes4) || strtolower($localidad_viviendo_alumno) == strtolower($dean_funes5)) {
		$localidad_viviendo_alumno = 1589;
	}
	
	//E
	if (strtolower($localidad_viviendo_alumno) == strtolower($e_aranado1)) {
		$localidad_viviendo_alumno = 1597;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($embalse1)) {
		$localidad_viviendo_alumno = 1637;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($etruria1)) {
		$localidad_viviendo_alumno = 1644;
	}

	//F
	if (strtolower($localidad_viviendo_alumno) == strtolower($fray_l_b1)) {
		$localidad_viviendo_alumno = 4567;
	}

	//G
	if (strtolower($localidad_viviendo_alumno) == strtolower($g_deheza1) || strtolower($localidad_viviendo_alumno) == strtolower($g_deheza2)) {
		$localidad_viviendo_alumno = 1657;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($g_lavalle1)) {
		$localidad_viviendo_alumno = 1659;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($g_baldi1) || strtolower($localidad_viviendo_alumno) == strtolower($g_baldi2)) {
		$localidad_viviendo_alumno = 1655;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($g_cabre1) || strtolower($localidad_viviendo_alumno) == strtolower($g_cabre2)) {
		$localidad_viviendo_alumno = 1656;
	}

	//H
	if (strtolower($localidad_viviendo_alumno) == strtolower($hernando1) || strtolower($localidad_viviendo_alumno) == strtolower($hernando2)) {
		$localidad_viviendo_alumno = 1672;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($holm1)) {
		$localidad_viviendo_alumno = 2056;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($haedo1)) {
		$localidad_viviendo_alumno = 420;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($huelva1)) {
		$localidad_viviendo_alumno = 0;
	}

	//I
	if (strtolower($localidad_viviendo_alumno) == strtolower($isla_verde1)) {
		$localidad_viviendo_alumno = 1685;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($idiazabal1)) {
		$localidad_viviendo_alumno = 1677;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($inrri1)) {
		$localidad_viviendo_alumno = 1681;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($i_casanova1)) {
		$localidad_viviendo_alumno = 176;
	}

	//J
	if (strtolower($localidad_viviendo_alumno) == strtolower($j_pose1)) {
		$localidad_viviendo_alumno = 1949;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($j_maria1) || strtolower($localidad_viviendo_alumno) == strtolower($j_maria2)) {
		$localidad_viviendo_alumno = 1688;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($j_craik1) || strtolower($localidad_viviendo_alumno) == strtolower($j_craik2)) {
		$localidad_viviendo_alumno = 1573;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($j_c_paz1)) {
		$localidad_viviendo_alumno = 699;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($junin1)) {
		$localidad_viviendo_alumno = 466;
	}

	//L
	if (strtolower($localidad_viviendo_alumno) == strtolower($las_varillas1) || strtolower($localidad_viviendo_alumno) == strtolower($las_varillas2) || strtolower($localidad_viviendo_alumno) == strtolower($las_varillas3)) {
		$localidad_viviendo_alumno = 1810;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($laboulaye1)) {
		$localidad_viviendo_alumno = 1774;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($lomas_zamora1)) {
		$localidad_viviendo_alumno = 570;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_perdices1)) {
		$localidad_viviendo_alumno = 1802;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($laborde1)) {
		$localidad_viviendo_alumno = 1773;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($leones1)) {
		$localidad_viviendo_alumno = 1816;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($ll1)) {
		$localidad_viviendo_alumno = 1777;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_playo1)) {
		$localidad_viviendo_alumno = 1759;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($laspiur1)) {
		$localidad_viviendo_alumno = 1812;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_pozos1)) {
		$localidad_viviendo_alumno = 1844;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_carlo1)) {
		$localidad_viviendo_alumno = 1731;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_pales1)) {
		$localidad_viviendo_alumno = 1751;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_juntu1)) {
		$localidad_viviendo_alumno = 1795;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_plata1)) {
		$localidad_viviendo_alumno = 513;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($lanus1)) {
		$localidad_viviendo_alumno = 532;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_flores1)) {
		$localidad_viviendo_alumno = 540;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($l_calera1)) {
		$localidad_viviendo_alumno = 1728;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($luque1)) {
		$localidad_viviendo_alumno = 1855;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($lincoln1)) {
		$localidad_viviendo_alumno = 563;
	}

	//M
	if (strtolower($localidad_viviendo_alumno) == strtolower($moron1) || strtolower($localidad_viviendo_alumno) == strtolower($moron2)) {
		$localidad_viviendo_alumno = 641;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($m_juarez1) || strtolower($localidad_viviendo_alumno) == strtolower($m_juarez2)) {
		$localidad_viviendo_alumno = 1690;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($morri1)) {
		$localidad_viviendo_alumno = 1888;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($m_buey1)) {
		$localidad_viviendo_alumno = 1880;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($martinez1)) {
		$localidad_viviendo_alumno = 607;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($merlo1)) {
		$localidad_viviendo_alumno = 617;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($m_coronado1) || strtolower($localidad_viviendo_alumno) == strtolower($m_coronado2)) {
		$localidad_viviendo_alumno = 229;
	}

	//N
	if (strtolower($localidad_viviendo_alumno) == strtolower($noetinger1)) {
		$localidad_viviendo_alumno = 1895;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($nogoya1)) {
		$localidad_viviendo_alumno = 2541;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($neuquen1)) {
		$localidad_viviendo_alumno = 3560;
	}

	//O
	if (strtolower($localidad_viviendo_alumno) == strtolower($oliva1)) {
		$localidad_viviendo_alumno = 1904;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($ordo1)) {
		$localidad_viviendo_alumno = 1909;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($oncativo1)) {
		$localidad_viviendo_alumno = 1907;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($olivos1)) {
		$localidad_viviendo_alumno = 673;
	}

	//P
	if (strtolower($localidad_viviendo_alumno) == strtolower($pascana1)) {
		$localidad_viviendo_alumno = 1918;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($p_molle1) || strtolower($localidad_viviendo_alumno) == strtolower($p_molle2)) {
		$localidad_viviendo_alumno = 1954;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($pasco1)) {
		$localidad_viviendo_alumno = 1919;
	}

	//R
	if (strtolower($localidad_viviendo_alumno) == strtolower($ramos_mejia1) || strtolower($localidad_viviendo_alumno) == strtolower($ramos_mejia2)) {
		$localidad_viviendo_alumno = 764;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($rosario1)) {
		$localidad_viviendo_alumno = 4761;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($r_segundo1) || strtolower($localidad_viviendo_alumno) == strtolower($r_segundo2)) {
		$localidad_viviendo_alumno = 1988;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($r_tercero1) || strtolower($localidad_viviendo_alumno) == strtolower($r_tercero2)) {
		$localidad_viviendo_alumno = 1989;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($r_cuarto1) || strtolower($localidad_viviendo_alumno) == strtolower($r_cuarto2)) {
		$localidad_viviendo_alumno = 1982;
	}

	//S
	if (strtolower($localidad_viviendo_alumno) == strtolower($s_m_tucu1) || strtolower($localidad_viviendo_alumno) == strtolower($s_m_tucu2)) {
		$localidad_viviendo_alumno = 5396;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($s_marcos1)) {
		$localidad_viviendo_alumno = 2041;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($src1)) {
		$localidad_viviendo_alumno = 2064;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($s_eufemia1)) {
		$localidad_viviendo_alumno = 2058;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($s_peli1)) {
		$localidad_viviendo_alumno = 1925;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($serrano1)) {
		$localidad_viviendo_alumno = 2072;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($s_rosa_pri1) || strtolower($localidad_viviendo_alumno) == strtolower($s_rosa_pri2)) {
		$localidad_viviendo_alumno = 2065;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($s_espiritu1)) {
		$localidad_viviendo_alumno = 4802;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($saladillo1)) {
		$localidad_viviendo_alumno = 798;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($s_miguel1)) {
		$localidad_viviendo_alumno = 833;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($sarandi1)) {
		$localidad_viviendo_alumno = 859;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($saira1)) {
		$localidad_viviendo_alumno = 2002;
	}

	//T
	if (strtolower($localidad_viviendo_alumno) == strtolower($tio_pujio1) || strtolower($localidad_viviendo_alumno) == strtolower($tio_pujio2)) {
		$localidad_viviendo_alumno = 2096;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($ticino1)) {
		$localidad_viviendo_alumno = 2093;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($tapiales1)) {
		$localidad_viviendo_alumno = 889;
	}

	//U
	if (strtolower($localidad_viviendo_alumno) == strtolower($ucacha1)) {
		$localidad_viviendo_alumno = 2106;
	}

	//V
	if (strtolower($localidad_viviendo_alumno) == strtolower($v_d_rosario1)) {
		$localidad_viviendo_alumno = 2131;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($vm1) || strtolower($localidad_viviendo_alumno) == strtolower($vm2) || strtolower($localidad_viviendo_alumno) == strtolower($vm3)) {
		$localidad_viviendo_alumno = 2146;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($villa_const1) || strtolower($localidad_viviendo_alumno) == strtolower($villa_const2)) {
		$localidad_viviendo_alumno = 4856;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($vn1)) {
		$localidad_viviendo_alumno = 2080;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($villa_rumi1)) {
		$localidad_viviendo_alumno = 2154;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($v_guti1)) {
		$localidad_viviendo_alumno = 2141;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($v_tuerto1)) {
		$localidad_viviendo_alumno = 4846;
	}
	if (strtolower($localidad_viviendo_alumno) == strtolower($v_tulumba1)) {
		$localidad_viviendo_alumno = 2158;
	}


//'".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$numerocalle_alumno."','".$gra_depto."','".$gra_piso."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$provincia_nac_alumno."','".$localidad_nac_alumno."','".$provincia_trabajo_alumno."','".$localidad_trabajo_alumno."','".$provincia_viviendo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."'

	//$gra_sql .= "INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,facebook_alumno,numerodni_alumno,tipodni_alumno,foto_alumno,carrera_alumno,ancho_final,alto_final,fechanacimiento_alumno,numerocalle_alumno,gra_depto,gra_piso,mail_alumno,mail_alumno2,twitter_alumno,provincia_nac_alumno,localidad_nac_alumno,provincia_trabajo_alumno,localidad_trabajo_alumno,provincia_viviendo_alumno,localidad_viviendo_alumno,perfilacademico_alumno,perfil_laboral_alumno) VALUES ('".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$numerocalle_alumno."','".$gra_depto."','".$gra_piso."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$provincia_nac_alumno."','".$localidad_nac_alumno."','".$provincia_trabajo_alumno."','".$localidad_trabajo_alumno."','".$provincia_viviendo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."');<br>";
	$gra_sql .= "INSERT INTO alumno(id_alumno,nombre_alumno,apellido_alumno,facebook_alumno,numerodni_alumno,tipodni_alumno,foto_alumno,carrera_alumno,ancho_final,alto_final,fechanacimiento_alumno,calle_alumno,numerocalle_alumno,mail_alumno,mail_alumno2,twitter_alumno,localidad_nac_alumno,localidad_trabajo_alumno,localidad_viviendo_alumno,perfilacademico_alumno,perfil_laboral_alumno) VALUES ('".$id_alumno."','".$nombre_alumno."','".$apellido_alumno."','".$facebook_alumno."','".$numerodni_alumno."','".$tipodni_alumno."','".$foto_alumno."','".$carrera_alumno."','".$ancho_final."','".$alto_final."','".$fechanacimiento_alumno."','".$calle_alumno."','".$numerocalle_alumno."','".$mail_alumno."','".$mail_alumno2."','".$twitter_alumno."','".$localidad_nac_alumno."','".$localidad_trabajo_alumno."','".$localidad_viviendo_alumno."','".$perfilacademico_alumno."','".$perfil_laboral_alumno."');<br>";
}


//include_once("conexionCursoExtension.php");
echo $gra_sql;

include_once "cerrar_conn.php";



	// //---

	// echo strtolower($a_cabral1 = "Arroyo cabral").'<br>';
	// echo strtolower($alicia1 = "Alicia").'<br>';
	// echo strtolower($a_algodon1 = "Arroyo Algodon").'<br>';
	// echo strtolower($a_algodon2 = "Arroyo Algodón").'<br>';
	// echo strtolower($alma1 = "Almafuerte").'<br>';
	// echo strtolower($ausonia1 = "Ausonia").'<br>';
	// echo strtolower($arrecifes1 = "Arrecifes").'<br>';
	// echo strtolower($alsina1 = "Valentin Alsina").'<br>';
	// echo strtolower($a_alegre1 = "Alto Alegre").'<br>';
	// echo strtolower($armstrong1 = "Armstrog").'<br>';

	// echo strtolower($bs_as1 = "Capital Federal").'<br>';
	// echo strtolower($bs_as2 = "bs as").'<br>';
	// echo strtolower($bs_as3 = "Ciudad Autonoma de Buenos Aires").'<br>';
	// echo strtolower($bs_as4 = "CABA").'<br>';
	// echo strtolower($bs_as5 = "Ciudad Aut. De Buenos Aires").'<br>';
	// echo strtolower($bs_as6 = "Cap. Federal").'<br>';
	// echo strtolower($bs_as7 = "Caballito").'<br>';
	// echo strtolower($bs_as8 = "BsAs").'<br>';
	// echo strtolower($bell_ville1 = "Bell Ville").'<br>';
	// echo strtolower($bell_ville2 = "Bell Vill").'<br>';
	// echo strtolower($ballesteros1 = "Ballesteros").'<br>';
	// echo strtolower($ballesteros_sud1 = "Ballesteros Sud").'<br>';
	// echo strtolower($bragado1 = "Bragado").'<br>';
	// echo strtolower($benavidez1 = "Benavidez").'<br>';
	// echo strtolower($boulogne1 = "Boulogne").'<br>';
	// echo strtolower($balnearia1 = "Balnearia").'<br>';
	// echo strtolower($baradero1 = "Baradero").'<br>';

	// echo strtolower($carrilobo1 = "Carrilobo").'<br>';
	// echo strtolower($cba1 = "Córdoba").'<br>';
	// echo strtolower($cba2 = "Cordoba").'<br>';
	// echo strtolower($cba3 = "Cba").'<br>';
	// echo strtolower($cba4 = "Capital Córdoba").'<br>';
	// echo strtolower($cba5 = "Capital Cordoba").'<br>';
	// echo strtolower($cba6 = "capital").'<br>';
	// echo strtolower($cba7 = "Córdoba Capital").'<br>';
	// echo strtolower($canals1 = "Canals").'<br>';
	// echo strtolower($c_marina1 = "Colonia Marina").'<br>';
	// echo strtolower($chili1 = "Chilibroste").'<br>';
	// echo strtolower($chazon1 = "Chazón").'<br>';
	// echo strtolower($c_d_bustos1 = "Corral de Bustos").'<br>';
	// echo strtolower($c_oeste1 = "Calchin Oeste").'<br>';
	// echo strtolower($castelar1 = "Castelar").'<br>';
	// echo strtolower($chivil1 = "Chivilcoy").'<br>';
	// echo strtolower($caseros1 = "Caseros").'<br>';
	// echo strtolower($c_alta1 = "Cruz Alta").'<br>';
	// echo strtolower($cintra1 = "Cintra").'<br>';

	// echo strtolower($dean_funes1 = "Dean Funes").'<br>';
	// echo strtolower($dean_funes2 = "Dean Funez").'<br>';
	// echo strtolower($dean_funes3 = "Deán Funez").'<br>';
	// echo strtolower($dean_funes4 = "Deán Funes").'<br>';
	// echo strtolower($dean_funes5 = "Deam Funes").'<br>';

	// echo strtolower($e_aranado1 = "El Arañado").'<br>';
	// echo strtolower($embalse1 = "Embalse").'<br>';
	// echo strtolower($etruria1 = "Etruria").'<br>';

	// echo strtolower($fray_l_b1 = "Fray Luis Beltran").'<br>';

	// echo strtolower($g_deheza1 = "Gral Deheza").'<br>';
	// echo strtolower($g_deheza2 = "General Deheza").'<br>';
	// echo strtolower($g_lavalle1 = "General Lavalle").'<br>';
	// echo strtolower($g_baldi1 = "Gral Baldisera").'<br>';
	// echo strtolower($g_baldi2 = "General Baldissera").'<br>';
	// echo strtolower($g_cabre1 = "General Cabrera").'<br>';
	// echo strtolower($g_cabre2 = "Gral Cabrera").'<br>';

	// echo strtolower($hernando1 = "Herenando").'<br>';
	// echo strtolower($hernando2 = "Hernando").'<br>';
	// echo strtolower($holm1 = "Holmberg").'<br>';
	// echo strtolower($haedo1 = "Haedo").'<br>';
	// echo strtolower($huelva1 = "Huelva").'<br>';

	// echo strtolower($isla_verde1 = "Isla verde").'<br>';
	// echo strtolower($idiazabal1 = "Idiazabal").'<br>';
	// echo strtolower($inrri1 = "Inriville").'<br>';
	// echo strtolower($i_casanova1 = "Isidro Casanova").'<br>';

	// echo strtolower($j_pose1 = "Justiniano Posse").'<br>';
	// echo strtolower($j_maria1 = "Jesus Maria").'<br>';
	// echo strtolower($j_maria2 = "Jesus María").'<br>';
	// echo strtolower($j_craik1 = "James craik").'<br>';
	// echo strtolower($j_craik2 = "Jame craik").'<br>';
	// echo strtolower($j_c_paz1 = "Jose C. Paz").'<br>';
	// echo strtolower($junin1 = "Junin").'<br>';

	// echo strtolower($las_varillas1 = "Las Varillas").'<br>';
	// echo strtolower($las_varillas2 = "Las Varillas ").'<br>';
	// echo strtolower($las_varillas3 = "Las Varias").'<br>';
	// echo strtolower($l_perdices1 = "Las Perdices").'<br>';
	// echo strtolower($laborde1 = "Laborde").'<br>';
	// echo strtolower($l_playo1 = "La Playosa").'<br>';
	// echo strtolower($l_carlo1 = "La Carlota").'<br>';
	// echo strtolower($l_calera1 = "La Calera").'<br>';

	// echo strtolower($laboulaye1 = "Laboulaye").'<br>';
	// echo strtolower($lomas_zamora1 = "Lomas de Zamora").'<br>';
	// echo strtolower($leones1 = "Leones").'<br>';
	// echo strtolower($ll1 = "Laguna Larga").'<br>';
	// echo strtolower($laspiur1 = "Laspiur").'<br>';
	// echo strtolower($l_pozos1 = "Los Pozos").'<br>';
	// echo strtolower($l_pales1 = "La Palestina").'<br>';
	// echo strtolower($l_juntu1 = "Las Junturas").'<br>';
	// echo strtolower($l_plata1 = "La Plata").'<br>';
	// echo strtolower($lanus1 = "Lanús Oeste").'<br>';
	// echo strtolower($l_flores1 = "Flores").'<br>';
	// echo strtolower($luque1 = "Luque").'<br>';
	// echo strtolower($lincoln1 = "Lincoln").'<br>';

	// echo strtolower($moron1 = "MORON").'<br>';
	// echo strtolower($moron2 = "morón").'<br>';
	// echo strtolower($m_juarez1 = "Marcos Juarez").'<br>';
	// echo strtolower($m_juarez2 = "Marco Juarez").'<br>';
	// echo strtolower($morri1 = "Morrison").'<br>';
	// echo strtolower($m_buey1 = "Monte Buey").'<br>';
	// echo strtolower($martinez1 = "Martinez").'<br>';
	// echo strtolower($merlo1 = "Merlo").'<br>';
	// echo strtolower($m_coronado1 = "Martín Colorado").'<br>';
	// echo strtolower($m_coronado2 = "Martin Colorado").'<br>';

	// echo strtolower($noetinger1 = "Noetinger").'<br>';
	// echo strtolower($nogoya1 = "Nogoya").'<br>';
	// echo strtolower($neuquen1 = "Neuquen").'<br>';

	// echo strtolower($oliva1 = "Oliva").'<br>';
	// echo strtolower($ordo1 = "Ordoñez").'<br>';
	// echo strtolower($oncativo1 = "Oncativo").'<br>';
	// echo strtolower($olivos1 = "Olivos").'<br>';

	// echo strtolower($pascana1 = "Pascana").'<br>';
	// echo strtolower($p_molle1 = "Pozo Del Molle").'<br>';
	// echo strtolower($p_molle2 = "Pozo del Molle").'<br>';
	// echo strtolower($pasco1 = "Pasco").'<br>';

	// echo strtolower($ramos_mejia1 = "Ramos Mejia").'<br>';
	// echo strtolower($ramos_mejia2 = "Ramos Mejía").'<br>';
	// echo strtolower($rosario1 = "Rosario").'<br>';
	// echo strtolower($r_segundo1 = "Rio Segundo").'<br>';
	// echo strtolower($r_segundo2 = "Río Segundo").'<br>';
	// echo strtolower($r_tercero1 = "Río Tercero").'<br>';
	// echo strtolower($r_tercero2 = "Rio Tercero").'<br>';
	// echo strtolower($r_cuarto1 = "Rio Cuarto").'<br>';
	// echo strtolower($r_cuarto2 = "Río Cuarto").'<br>';

	// echo strtolower($s_m_tucu1 = "San Miguel de Tucumán").'<br>';
	// echo strtolower($s_m_tucu2 = "San Miguel de Tucuman").'<br>';
	// echo strtolower($s_marcos1 = "San Marcos").'<br>';
	// echo strtolower($src1 = "Santa Rosa De Ctalamuchita").'<br>';
	// echo strtolower($s_eufemia1 = "Santa Eufemia").'<br>';
	// echo strtolower($s_peli1 = "Silvio Pélico").'<br>';
	// echo strtolower($serrano1 = "Serrano").'<br>';
	// echo strtolower($s_rosa_pri1 = "Santa Rosa de Rio Primero").'<br>';
	// echo strtolower($s_rosa_pri2 = "Santa Rosa de Río Primero").'<br>';
	// echo strtolower($s_espiritu1 = "Sancti Spiritu").'<br>';
	// echo strtolower($saladillo1 = "Saladillo").'<br>';
	// echo strtolower($s_miguel1 = "San Miguel").'<br>';
	// echo strtolower($sarandi1 = "Sarandi").'<br>';
	// echo strtolower($saira1 = "Saira").'<br>';

	// echo strtolower($tio_pujio1 = "Tio Pujio").'<br>';
	// echo strtolower($tio_pujio2 = "Tío Pujio").'<br>';
	// echo strtolower($ticino1 = "Ticino").'<br>';
	// echo strtolower($tapiales1 = "Tapiales").'<br>';

	// echo strtolower($ucacha1 = "Ucacha").'<br>';

	// echo strtolower($v_d_rosario1 = "Villa del Rosario").'<br>';
	// echo strtolower($vm1 = "Villa María").'<br>';
	// echo strtolower($vm2 = "Villa Maria").'<br>';
	// echo strtolower($vn1 = "Villa Nueva").'<br>';
	// echo strtolower($villa_const1 = "Villa Constitución").'<br>';
	// echo strtolower($villa_const2 = "Villa Constitucion").'<br>';
	// echo strtolower($villa_rumi1 = "Villa Rumipal").'<br>';
	// echo strtolower($v_guti1 = "Villa Gutierrez").'<br>';
	// echo strtolower($v_tuerto1 = "Venado Tuerto").'<br>';
	// echo strtolower($v_tulumba1 = "vVilla Tulumba").'<br>';

	// echo strtolower($c25_d_mayo1 = "25 de Mayo").'<br>';

	// //---
?>