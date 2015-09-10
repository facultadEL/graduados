<html>
<head>
<title> Nuevo Grupo </title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style type="text/css">
	label {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
	#tabla {background: #F2F2F2;}
	#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1.5em;}
	l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
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
		document.buscador.submit(); 
	}
	</script>
</head>
<body link="#000000" vlink="#000000" alink="#FFFFFF">
<?php
$carrera_seleccionada = $_REQUEST['carreraBuscar'];
$nivel_carrera_seleccionada = $_REQUEST['carreraNivelBuscar'];
$grupo_seleccionado = $_REQUEST['grupoBuscar'];
$id_Grupo = $_REQUEST['idGrupo'];
?>
<form class="buscador" id="buscador" name="buscador" action="" method="post">
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Grupo para asignaci&oacute;n de Graduados</FONT></legend>
<center>
	<table align="center" cellspacing="1" width="100%" cellpadding="4" bgcolor="#585858" id="tabla1">
		<tr width="100%">
			<td width="30%" align="right"><label>Grupo: </label></td>
			<td width="70%">
				<select name="grupoBuscar" size="1" class="myTextField" id="cgrupoBuscar" onChange="evaluaring()"  onkeyup=fn(this.form,this)>
				<option value="0">Seleccione un grupo</option>
				<?php
					include_once "conexion.php";
					$grupo = pg_query("SELECT * FROM grupo_alumnos ORDER BY nombre_grupo");
					while($rowGrupo = pg_fetch_array($grupo)){
						$id_grupo_alumnos = $rowGrupo['id_grupo_alumnos'];
						if ($grupo_seleccionado == $id_grupo_alumnos){
							echo "<option value=".$id_grupo_alumnos." selected>".$rowGrupo['nombre_grupo']."</option>";
						}else{
							echo "<option value=".$id_grupo_alumnos.">".$rowGrupo['nombre_grupo']."</option>";
							}
						}
				?>
				</select>
			</td>
		</tr>
	</table>
</center>
</fieldset>
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Filtro Nivel de carrera</FONT></legend>
	<table align="center" cellspacing="1" width="100%" cellpadding="4" bgcolor="#585858" id="tabla1">
		<tr width="100%">
			<td width="30%"><label>Filtrar Nivel Carrera: </label></td>
			<td width="70%">
				<select name="carreraNivelBuscar" size="1" class="myTextField" id="ccarreraNivelBuscar" onChange="evaluaring()"  onkeyup=fn(this.form,this)>
				<option value="0">Seleccione un nivel</option>
				<?php
					include_once "conexion.php";
					$nivelCarrera = pg_query("SELECT * FROM nivel_carrera ORDER BY id_nivel_carrera");
					while($rowNivelCarrera = pg_fetch_array($nivelCarrera)){
						$id_nivel_carrera = $rowNivelCarrera['id_nivel_carrera'];
						if ($nivel_carrera_seleccionada == $id_nivel_carrera){
							echo "<option value=".$id_nivel_carrera." selected>".$rowNivelCarrera['nombre_nivel_carrera']."</option>";
						}else{
							echo "<option value=".$id_nivel_carrera.">".$rowNivelCarrera['nombre_nivel_carrera']."</option>";
							}
						}
				?>
				</select>
			</td>
		</tr>
	</table>
</fieldset>
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Filtro de Graduados</FONT></legend>
	<table align="center" cellspacing="1" width="100%" cellpadding="4" bgcolor="#585858" id="tabla1">
		<tr width="100%">
			<td width="30%" align="right"><label>Filtrar Carrera: </label></td>
			<td width="70%">
				<select name="carreraBuscar" size="1" class="myTextField" id="ccarreraBuscar" onChange="evaluaring()"  onkeyup=fn(this.form,this)>
				<option value="0">Seleccione una carrera</option>
				<?php
					include_once "conexion.php";
					$carrera = pg_query("SELECT * FROM carrera WHERE nivel_carrera_fk = '$nivel_carrera_seleccionada' ORDER BY nombre_carrera");
					while($rowCarrera = pg_fetch_array($carrera)){
						$id_carrera = $rowCarrera['id_carrera'];
						if ($carrera_seleccionada == $id_carrera){
							echo "<option value=".$id_carrera." selected>".$rowCarrera['nombre_carrera']."</option>";
						}else{
							echo "<option value=".$id_carrera.">".$rowCarrera['nombre_carrera']."</option>";
							}
						}
				?>
				</select>
			</td>
		</tr>
	</table>
</fieldset>
</form>
<form class="asignar" id="asignar" name="asignar" action="asignarGraduado.php?id_grupo_seleccionado=<?php echo $grupo_seleccionado; ?>&id_nivel_carrera_seleccionada=<?php echo $nivel_carrera_seleccionada; ?>&id_carrera_seleccionada=<?php echo $carrera_seleccionada; ?>" method="post">
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Cantidad de Graduados</FONT></legend>
<?php
//NO PREGUNTEN QUE HICE ACA PORQUE NO LO SÉ. LÓGICA REBUSCADA...
$i=1;
$a=0;
$k=0;
$na=0;
$contA=0;
$contM=0;
$distinto=0;
$val = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,nombre_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN alumnos_por_grupo ON(alumnos_por_grupo.alumno_fk = alumno.id_alumno) WHERE carrera_alumno = '$carrera_seleccionada' AND grupo_fk = '$grupo_seleccionado' ORDER BY id_alumno");
while($row=pg_fetch_array($val,NULL,PGSQL_ASSOC)){
	$graduado_asignado[$a] = $row['id_alumno'];
	$contA++;
	$a++;
}
$val1 = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,nombre_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) WHERE carrera_alumno = '$carrera_seleccionada'  ORDER BY id_alumno");
while($row1=pg_fetch_array($val1,NULL,PGSQL_ASSOC)){
	$graduados_mostrar[$na] = $row1['id_alumno'];
	$nombre_alumno[$na] = $row1['nombre_alumno'];
	$apellido_alumno[$na] = $row1['apellido_alumno'];
	$nombre_carrera[$na] = $row1['nombre_carrera'];
	$contM++;
	$na++;
}

// // if ($grupo_seleccionado != 0 && $nivel_carrera_seleccionada == 0 && $carrera_seleccionada == 0){
// 	$val = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,nombre_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN alumnos_por_grupo ON(alumnos_por_grupo.alumno_fk = alumno.id_alumno) WHERE grupo_fk = '$grupo_seleccionado' ORDER BY id_alumno");
// 	while($row=pg_fetch_array($val,NULL,PGSQL_ASSOC)){
// 		$graduado_asignado[$a] = $row['id_alumno'];
// 		$contA++;
// 		$a++;
// 	}
// // }
// if ($grupo_seleccionado != 0 && $nivel_carrera_seleccionada != 0 && $carrera_seleccionada == 0){
// 	$val1 = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,nombre_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) WHERE nivel_carrera_fk = $nivel_carrera_seleccionada  ORDER BY id_alumno");
// 	while($row1=pg_fetch_array($val1,NULL,PGSQL_ASSOC)){
// 		$graduados_mostrar[$na] = $row1['id_alumno'];
// 		$nombre_alumno[$na] = $row1['nombre_alumno'];
// 		$apellido_alumno[$na] = $row1['apellido_alumno'];
// 		$nombre_carrera[$na] = $row1['nombre_carrera'];
// 		$contM++;
// 		$na++;
// 		$contador = $contador + 1;
// 	}
// }

// if ($grupo_seleccionado != 0 && $nivel_carrera_seleccionada != 0 && $carrera_seleccionada != 0){
// 	$val2 = pg_query("SELECT id_alumno,nombre_alumno,apellido_alumno,nombre_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) WHERE carrera_alumno = '$carrera_seleccionada'  ORDER BY id_alumno");
// 	while($row2=pg_fetch_array($val2,NULL,PGSQL_ASSOC)){
// 		$graduados_mostrar[$na] = $row2['id_alumno'];
// 		$nombre_alumno[$na] = $row2['nombre_alumno'];
// 		$apellido_alumno[$na] = $row2['apellido_alumno'];
// 		$nombre_carrera[$na] = $row2['nombre_carrera'];
// 		$contM++;
// 		$na++;
// 		$contador = $contador + 1;
// 	}
// }







echo '<table align="center" cellspacing="1" width="100%" cellpadding="4" border="1" bgcolor="#585858" id="tabla">';
echo '<tr bgcolor="#585858" width="100%">';
	echo '<td align="center" width="50%"><label>Asignados</label></td>';
	echo '<td align="center" width="50%"><label>Para Asignar</label></td>';
echo '</tr>';
$totalMostrar = $contM - $contA;
echo '<tr>';
	echo '<td align="center" width="50%"><strong><l2>'.$contA.'</l2></strong></td>';
	if ($contM != 0){
		echo '<td align="center" width="10%"><strong><l2>'.$totalMostrar.'</l2></strong></td>';
	}else{
		echo '<td align="center" width="10%"><strong><l2>0</l2></strong></td>';
	}
echo '</tr>';
echo '</table>';
echo '</fieldset>';
echo '<fieldset id="tabla">';
echo '<legend><FONT face="Cambria" size="4" color="#6E6E6E">Graduados para selecci&oacute;n</FONT></legend>';
echo '<table align="center" cellspacing="1" width="100%" cellpadding="4" border="1" bgcolor="#585858" id="tabla">';
	echo '<tr bgcolor="#FFFFFF" width="100%">';
		echo '<td id="titulo3" colspan="5" align="center"><l1>Listado de Graduados</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000" width="100%">';
		echo '<td align="center" width="10%"><strong><label>&nbsp;</label></strong></td>';
		echo '<td align="center" width="50%"><strong><label>Graduado</label></strong></td>';
		echo '<td align="center" width="30%"><strong><label>Carrera</label></strong></td>';
		echo '<td align="center" width="10%"><strong><label>Selecci&oacute;n</label></strong></td>';
	echo '</tr>';
if ($contA != 0){
$contador = 0;
	for($k=0;$k<$contM;$k++){
		for($j=0;$j<$contA;$j++){
			if ($graduados_mostrar[$k] != $graduado_asignado[$j]){
				$distinto++;
				if ($distinto == $contA){

					$id_Graduado = $graduados_mostrar[$k];
					$contador = $contador + 1;
					echo '<tr>';
					echo '<td align="center"><l2>'.$contador.'</l2></td>';
						echo '<td align="left"><l2>'.$nombre_alumno[$k].', '.$apellido_alumno[$k].'</l2></td>';
						echo '<td align="center"><l2>'.$nombre_carrera[$k].'</l2></td>';
						$seleccion_graduado = "seleccion_graduado".$i;
						echo '<td align="center"><input type="checkbox" name="'.$seleccion_graduado.'" value="Asignar"/></td>';
						$tomar_id_seleccion = "id_graduado".$i;
						echo '<input type="hidden" name="'.$tomar_id_seleccion.'" value="'.$id_Graduado.'"/>';
						$i++;
					echo '</tr>';
					$distinto = 0;
				}
			}
		}
		$distinto = 0;
	}
}else{
$contador = 0;
	for($k=0;$k<$contM;$k++){
		$id_Graduado = $graduados_mostrar[$k];
		$contador = $contador + 1;
		echo '<tr>';
			echo '<td align="center"><l2>'.$contador.'</l2></td>';
			echo '<td align="left"><l2>'.$nombre_alumno[$k].', '.$apellido_alumno[$k].'</l2></td>';
			echo '<td align="center"><l2>'.$nombre_carrera[$k].'</l2></td>';
			$seleccion_graduado = "seleccion_graduado".$i;
			echo '<td align="center"><input type="checkbox" name="'.$seleccion_graduado.'" value="Asignar"/></td>';
			$tomar_id_seleccion = "id_graduado".$i;
			echo '<input type="hidden" name="'.$tomar_id_seleccion.'" value="'.$id_Graduado.'"/>';
			$i++;
		echo '</tr>';
	}
}
echo '</table>';
?>
</fieldset>
<p>
<center>
<table>
	<tr>
		<td>
			<a href=""><input type="submit" value="Asignar"></a>
		</td>
		<td>
			<a href="crearGrupoConsulta.php"><input type="button" value="Listado de Grupos"></a>
		</td>
	</tr>
</table>
</center>
</p>
</form>
<p>
<a href="crearGrupoConsulta.php"><center><input type="button" value="Atr&aacute;s"></center></a>
</p>
</body>
</html>