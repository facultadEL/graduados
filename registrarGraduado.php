<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<title>Registro de Graduado</title>
	<?php include_once "basicos/head.html"; ?>
		<script defer>
			var locnac = null;
			var loctrab = null;
			var locVive = null;
			
			var telefonos = [];
			var sep = '/--/';
		
			function cargarLocNac(idProvincia){
				//Acá le mando los parametros y lo leo con POST en el otro archivo
				var parametros = {
	                "idProvincia" : idProvincia
	        	};

				$.ajax({
					type: "POST",
					url: "GetCiudades.php", //Este es el archivo al que tiene que ir a buscar los datos
					data: parametros,
					success:  function (response) { //Funcion que ejecuta si todo pasa bien. El response es los datos que manda el otro archivo
	                        $("#gra_locnac").html(response);
	                        loadLocNac();
	                },
					error: function (msg) {
						alert("No se pudieron encontrar las ciudades");
					}
				});
			}

			function cargarLocTrab(idProvincia){
				//Acá le mando los parametros y lo leo con POST en el otro archivo
				var parametros = {
	                "idProvincia" : idProvincia
	        	};

				$.ajax({
					type: "POST",
					url: "GetCiudades.php", //Este es el archivo al que tiene que ir a buscar los datos
					data: parametros,
					success:  function (response) { //Funcion que ejecuta si todo pasa bien. El response es los datos que manda el otro archivo
	                        $("#gra_loctrab").html(response);
	                        loadLocTrab();
	                },
					error: function (msg) {
						alert("No se pudieron encontrar las ciudades");
					}
				});
			}

			function cargarLocVive(idProvincia){
				//Acá le mando los parametros y lo leo con POST en el otro archivo
				var parametros = {
	                "idProvincia" : idProvincia
	        	};

				$.ajax({
					type: "POST",
					url: "GetCiudades.php", //Este es el archivo al que tiene que ir a buscar los datos
					data: parametros,
					success:  function (response) { //Funcion que ejecuta si todo pasa bien. El response es los datos que manda el otro archivo
	                        $("#gra_locvive").html(response);
	                        loadLocVive();
	                },
					error: function (msg) {
						alert("No se pudieron encontrar las ciudades");
					}
				});
			}

			function setLocNac(idCiudadNac){
				locnac = idCiudadNac;
			}

			function setLocTrab(idCiudadTrab){
				loctrab = idCiudadTrab;
			}

			function setLocVive(idCiudadVive){
				ciudadVive = idCiudadVive;
			}

			function loadLocNac(){
				if(locnac != null){
					//nombreVar = '#ciudad option:eq('+locnac+')';
					nombreVar = '#gra_locnac option[value="'+locnac+'"]';
					$(nombreVar).prop('selected', true);
				}
			}

			function loadLocTrab(){
				if(loctrab != null){
					//nombreVar = '#gra_loctrab option:eq('+loctrab+')';
					nombreVar = '#gra_loctrab option[value="'+loctrab+'"]';
					$(nombreVar).prop('selected', true);
				}
			}

			function loadLocVive(){
				if(locVive != null){
					nombreVar = '#gra_locvive option[value="'+locVive+'"]';
					$(nombreVar).prop('selected', true);
				}
			}

			function addTel(){
				if(controlCarga()){
		    
		    		datosTel = $('#gra_duenio').val() + sep;
					//datosTel += $('#gra_caractel').val() + '-' + $('#gra_nrotel').val() + sep;
					datosTel += $('#gra_caractel').val() + sep;
					datosTel += $('#gra_nrotel').val() + sep;
					//datosTel += $('#gra_nrotel').val() + sep;
					datosTel += '-1';

					telefonos.push(datosTel);
					$('#a_vacio').attr('hidden', true);

					mostrarDatos();
				}
			}

			function controlCarga(){
				if(!controlVacio('#gra_caractel')) return false;
				if(!controlVacio('#gra_nrotel')) return false;
				if(!controlVacio('#gra_duenio')) return false;
				if(!sinCero('#gra_caractel')) {
					$('#a_carac').attr('hidden', false);
					$('#error').addClass('has-error');
					return false;
				}else{
					$('#a_carac').attr('hidden', true);
					$('#error').removeClass('has-error');
				}
				//if(!validarLargoTel('#gra_nrotel','#a_tel',6,8)) return false;
				return true;
			}

			function controlVacio(nombreSelector){
			    if($.trim($(nombreSelector).val()) == ''){
		        	//$(nombreSelector).css('box-shadow','0px 0px 10px 5px #f24d4d');
		        	$('#a_vacio').attr('hidden', false);
		        	$('#error').addClass('has-error');
			        $(nombreSelector).focus();
		    	    return false;
		    	}
		    	return true;
			}

			function mostrarDatos(){
				sepDatosCompletos = '/--/--/';
				datosCompletos = '';

				//htmlToAdd = '<tr><td class="td_titulo">Empresa</td><td class="td_titulo">Direcci&oacute;n</td><td class="td_titulo">Tel&eacute;fono</td><td class="td_titulo">Cargo</td><td class="td_titulo">Desc. del Cargo</td><td class="td_titulo">Desde</td><td class="td_titulo">Hasta</td><td class="td_titulo">Motivo de Egreso</td><td class="td_titulo">Acci&oacute;n</td></tr>';
				htmlToAdd = '<thead><tr><th class="text-center">Due&ntilde;o</th><th class="text-center">Tel&eacute;fono</th><th class="text-center">Acci&oacute;n</th></tr></thead>';

				for(var i = 0; i < telefonos.length; i++){
					datosCompletos += telefonos[i] + sepDatosCompletos;
					var vDatos = telefonos[i].split(sep);
					htmlToAdd += '<tbody class="text-center"><tr>';
					for(var j = 0; j < vDatos.length - 1; j++){
						if (j == 0) {
							htmlToAdd += '<td>'+vDatos[j]+'</td>';
						}
						if (j == 1) {
							htmlToAdd += '<td>'+vDatos[j]+'-';	
						}
						if (j == 2) {
							htmlToAdd += +vDatos[j]+'</td>';	
						}
						//htmlToAdd += '<td>'+vDatos[j]+'</td>';
					}
					htmlToAdd += '<td><button type="button" class="btn1 btn-primary btn-xs btn_add" onClick="quitarTelefono('+i+')" title="Haga click para quitar un tel&eacute;fono cargado"><i class="fa fa-minus fa-md"></i></button></td></tr></tbody>';
				}

				$('#hiddenLisTel').val(datosCompletos);
				$('#tel_cargados').html(htmlToAdd);
				limpiarCampos();
				//$('#anio_pri').attr('hidden', true);
				//$('#Dmayor').attr('hidden', true);
			}

			function limpiarCampos(){
				$('#gra_caractel').val("");
				$('#gra_nrotel').val("");
				$('#gra_duenio').val("");
			}

			function quitarTelefono(index){
				telefonos.splice(index,1);
				mostrarDatos();
			}

			function loadTelFromDB(stringTelefonos){
				telefonos.push(stringTelefonos);
			}


			// function validaCarac(){
			// 	if(!sinCero('#gra_caractel')) return false;
			// 	//if(!soloNumero('#gra_caractel')) return false;
			// 	if(!validarLargo('#gra_caractel',4)) return false;
			// }

			function sinCero(id){

    			//var nro_carac = $('#'+id).val();
    			var nro_carac = $(id).val();
				var cero = nro_carac.split("0",1);

				if(cero != ""){
					return true;
				}
				return false;
			}

			var numbers = [9,49,50,51,52,53,54,55,56,57,48,97,98,99,100,101,102,103,104,105,8,10,96]
			function soloNumero(e){
				if($.inArray(e.keyCode,numbers)!=-1){
					return true;
				}
				return false;
			}

			// function validarLargo(id,long){
			// 	var valor = $(id).val();
			// 	if(valor.length < 0 || valor.length > long){
			// 		$(id).addClass('has-error');
			// 		$(id).focus();
			// 		return false;
			// 	}else if(valor.length >= 2){
			// 		$(id).addClass('has-normal');
			// 		return true;
			// 	}
			// }

			function validarLargoTel(id,alerta,longMin, longMax){
				var valor = $(id).val();
				if(valor.length < longMin || valor.length > longMax){
					$(alerta).attr('hidden', false);
					$('#error').addClass('has-error');
					$(id).focus();
					return false;
				}else if(valor.length >= longMin && valor.length <= longMax){
					$(alerta).attr('hidden', true);
					//$('#error').addClass('has-normal');
					return true;
				}
			}

			function sacarColor(campo,alerta){
		    	$(campo).removeClass('has-error');
		    	//ocultar_alertar()
		    	$(alerta).attr('hidden', true);
			}

			function ocultar_alertar(){
				$('#a_carac').attr('hidden', true);
				$('#a_tel').attr('hidden', true);
				$('#a_duenio').attr('hidden', true);
				$('#a_vacio').attr('hidden', true);
				$('#a_foto').attr('hidden', true);
			}

			//archivo
			function validarArchivo(){
				nombreArchivoValidar = $('#gra_foto').val();
				if(nombreArchivoValidar != ""){
					vNombreArchivoValidar = nombreArchivoValidar.split('.');
					extension = vNombreArchivoValidar[vNombreArchivoValidar.length - 1];
					if(extension != 'jpg' && extension != 'png' && extension != 'jpeg'){
						$('#a_foto').attr('hidden', false);
						//alert("Debe ingresar un archivo pdf!");
						$('#gra_foto').val("");
					}else{
						$('#a_foto').attr('hidden', true);
					}
				}
			}

			$(document).ready(function() {
				ocultar_alertar();
				mostrarDatos();
			});

		</script>

<body class="container-fluid">
<?php
include_once "conexion.php";
include_once "libreria.php";

$id_Alumno = (empty($_REQUEST['idAlumno'])) ? 0 : $_REQUEST['idAlumno'];
$numDNI = (empty($_REQUEST['numDNI'])) ? 0 : $_REQUEST['numDNI'];

if ($numDNI != 0) {
	$gra_nrodoc = $numDNI;
}

/*------------Telefonos de BD--------------*/

$sep = '/--/';

if ($id_Alumno != 0) {
	$sqlTelefonos=traerSql('id_telefonos_del_alumno,duenio_del_telefono,caracteristica_alumno,telefono_alumno', 'telefonos_del_alumno', 'alumno_fk ='.$id_Alumno);
	while($rowTelefonos = pg_fetch_array($sqlTelefonos)){
		//echo 'Entro';
		$stringEnviar = $rowTelefonos['duenio_del_telefono'].$sep.$rowTelefonos['caracteristica_alumno'].$sep.$rowTelefonos['telefono_alumno'].$sep.$rowTelefonos['id_telefonos_del_alumno'];
		//echo $stringEnviar;
		echo "<script>loadTelFromDB('".$stringEnviar."')</script>";
	}
	
}

/*-----------------------------------------*/

	if ($id_Alumno != 0){
		$sqlAlumno = traerSql('*', 'alumno', 'id_alumno = '.$id_Alumno);
		$rowAlumno = pg_fetch_array($sqlAlumno);
			$gra_nombre = $rowAlumno['nombre_alumno'];
			$gra_apellido = $rowAlumno['apellido_alumno'];
			$gra_tipodoc = $rowAlumno['tipodni_alumno'];
			$gra_nrodoc = $rowAlumno['numerodni_alumno'];			
			$gra_fecnac = $rowAlumno['fechanacimiento_alumno'];
			$gra_carrera = $rowAlumno['carrera_alumno'];
			$gra_grupo = $rowAlumno['gra_grupo'];
			$gra_locnac = $rowAlumno['localidad_nac_alumno'];
			$gra_loctrab = $rowAlumno['localidad_trabajo_alumno'];
			$gra_locvive = $rowAlumno['localidad_viviendo_alumno'];
			$gra_calle = $rowAlumno['calle_alumno'];
			$gra_nrocalle = $rowAlumno['numerocalle_alumno'];
			$gra_piso = $rowAlumno['gra_piso'];
			$gra_depto = $rowAlumno['gra_depto'];
			$gra_mail1 = $rowAlumno['mail_alumno'];
			$gra_mail2 = $rowAlumno['mail_alumno2'];
			$gra_facebook = $rowAlumno['facebook_alumno'];
			$gra_twitter = $rowAlumno['twitter_alumno'];
			$gra_peraca = $rowAlumno['perfilacademico_alumno'];
			$gra_perlab = $rowAlumno['perfil_laboral_alumno'];
			//$destinoImagen = $rowAlumno['foto_alumno'];
			//$ancho_final = $rowAlumno['ancho_final'];
			//$alto_final = $rowAlumno['alto_final'];
			echo "<script>setLocNac('".$gra_locnac."');setLocTrab('".$gra_loctrab."');setLocVive('".$gra_locvive."')</script>";
	}
	//onchange="sacarColor('gra_nombre','alerta5')" col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1
?>
	<form name="f1" id="f1" action="registrarDatosGraduado.php" method="post" id="encuesta" class="form-horizontal" enctype="multipart/form-data">
		<header>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<legend><h4>Nuevo Graduado</h4></legend>
				</div>
			</div>
		</header>
		<div class="panel-body">
			<div class="row">
				<div class="form-group">
					<label for="gra_nombre" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Nombre:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<input class="form-control input-sm" name="gra_nombre" id="gra_nombre" type="text" value="<?php echo $gra_nombre; ?>" maxlength="30" title="Ingrese el nombre del graduado" autofocus />
						<input name="idAlumno" type="hidden" value="<?php echo $id_Alumno; ?>" />
						<input name="hiddenLisTel" type="hidden" id="hiddenLisTel" value="" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_apellido" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Apellido:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<input class="form-control input-sm" name="gra_apellido" id="gra_apellido" type="text" value="<?php echo $gra_apellido; ?>" maxlength="30" title="Ingrese el apellido del graduado"/>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<label for="gra_tipodoc" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Tipo Doc.:</label>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<select name="gra_tipodoc" class="form-control input-sm" id="cbo" title="Seleccione el tipo de documento del graduado">
							<?php
								$tipodoc = traerSql('*','tipo_dni','');
								while($rowTipodoc=pg_fetch_array($tipodoc)){
									echo '<option value="'.$rowTipodoc['id_tipo_dni'].'" class="text-center">'.$rowTipodoc['nombre_tipo_dni'].'</option>';
								}
							?>
						</select>
					</div>

					<label for="gra_nrodoc" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 text-right">Nro. Doc.:</label>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<input class="form-control input-sm" name="gra_nrodoc" id="gra_nrodoc" type="text" value="<?php echo $gra_nrodoc; ?>" pattern="([0-9]{1}|[0-9]{2})[0-9]{3}[0-9]{3}" maxlength="8" title="Ingrese el n&uacute;mero de documento del graduado"/>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_fecnac" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Fec. Nac.:</label>
					<div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
						<input class="form-control input-sm" name="gra_fecnac" id="gra_fecnac" type="date" value="<?php echo $gra_fecnac; ?>" maxlength="10" title="Ingrese la fecha de nacimiento del graduado" />
					</div>
				</div>
			</div>

			<div class="row ">
				<div class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">
						<h4 class="pregrado"><i class="fa fa-square fa-lg"></i>Pregrado</h4>						
				</div>
				<div class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
						<h4 class="grado"><i class="fa fa-square fa-lg"></i>Grado</h4>
				</div>
				<div class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
						<h4 class="posgrado"><i class="fa fa-square fa-lg"></i>Posgrado</h4>

				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_carrera" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Carrera:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<select name="gra_carrera" class="form-control input-sm" id="cbo" title="Seleccione el tipo de documento del graduado">
						<option value="0">Seleccione una carrera...</option>
							<?php
								$carrera = traerSql('*','carrera INNER JOIN nivel_carrera ON nivel_carrera.id_nivel_carrera = carrera.nivel_carrera_fk ORDER BY nivel_carrera_fk,nombre_carrera','');
								while($rowCarrera=pg_fetch_array($carrera)){
									if($gra_carrera == $rowCarrera['id_carrera']){
										if ($rowCarrera['id_nivel_carrera'] == 1) {
											echo '<option value="'.$rowCarrera['id_carrera'].'" class="grado" selected>'.$rowCarrera['nombre_carrera'].'</option>';
										}elseif ($rowCarrera['id_nivel_carrera'] == 2) {
											echo '<option value="'.$rowCarrera['id_carrera'].'" class="posgrado" selected>'.$rowCarrera['nombre_carrera'].'</option>';
										}elseif ($rowCarrera['id_nivel_carrera'] == 3) {
											echo '<option value="'.$rowCarrera['id_carrera'].'" class="pregrado" selected>'.$rowCarrera['nombre_carrera'].'</option>';
										}
										//echo '<option value="'.$rowCarrera['id_carrera'].'" selected>'.$rowCarrera['nombre_carrera'].'</option>';
									}else{
										if ($rowCarrera['id_nivel_carrera'] == 1) {
											echo '<option value="'.$rowCarrera['id_carrera'].'" class="f_grado">'.$rowCarrera['nombre_carrera'].'</option>';
										}elseif ($rowCarrera['id_nivel_carrera'] == 2) {
											echo '<option value="'.$rowCarrera['id_carrera'].'" class="f_posgrado">'.$rowCarrera['nombre_carrera'].'</option>';
										}elseif ($rowCarrera['id_nivel_carrera'] == 3) {
											echo '<option value="'.$rowCarrera['id_carrera'].'" class="f_pregrado">'.$rowCarrera['nombre_carrera'].'</option>';
										}
										//echo '<option value="'.$rowCarrera['id_carrera'].'">'.$rowCarrera['nombre_carrera'].'</option>';
									}
								}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_grupo" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Grupo:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<select name="gra_grupo" class="form-control input-sm" id="cbo" title="Seleccione un grupo al que pertenece el graduado">
						<option value="0">Seleccione un grupo...</option>
							<?php
								if($id_Alumno == 0){
									$grupo = traerSql('*','grupo_alumnos ORDER BY nombre_grupo','');
									while($rowGrupo=pg_fetch_array($grupo)){
										echo '<option value="'.$rowGrupo['id_grupo_alumnos'].'">'.$rowGrupo['nombre_grupo'].'</option>';
									}
								}else{
									$id_grupo = traerDato('grupo_fk','alumnos_por_grupo', 'alumno_fk = '.$id_Alumno);
									$grupo = traerSql('*','grupo_alumnos ORDER BY nombre_grupo', '');

									while($rowGrupo=pg_fetch_array($grupo)){
										if($id_grupo == $rowGrupo['id_grupo_alumnos']){
											echo '<option value="'.$rowGrupo['id_grupo_alumnos'].'" selected>'.$rowGrupo['nombre_grupo'].'</option>';
										}else{
											echo '<option value="'.$rowGrupo['id_grupo_alumnos'].'">'.$rowGrupo['nombre_grupo'].'</option>';
										}
									}
								}
							?>
						</select>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<label for="gra_provnac" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Prov. Nac.:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<select name="gra_provnac" class="form-control input-sm" id="gra_provnac" onchange="if(this.value != 0){cargarLocNac(this.value)};" title="Seleccione la provincia de nacimiento del graduado">
						<option value="0">Seleccione una provincia...</option>
							<?php
								$provnac=traerSql('id, nombre','provincia', NULL);
								while($rowProvNac=pg_fetch_array($provnac)){
									if ($id_Alumno != 0) {
										$sql_prov = traerSql('fk_provincia', 'localidad', 'id ='.$gra_locnac);
										$rowIdProv=pg_fetch_array($sql_prov);
											$fk_provincia = $rowIdProv['fk_provincia'];
										if ($fk_provincia == $rowProvNac['id']){
											echo "<option value=".$rowProvNac['id']." selected>".$rowProvNac['nombre']."</option>";
											//$fk_provincia = $rowIdProv['fk_provincia'];
										}else{
											echo "<option value=".$rowProvNac['id'].">".$rowProvNac['nombre']."</option>";
										}
									}else{
										echo "<option value=".$rowProvNac['id'].">".$rowProvNac['nombre']."</option>";
									}
								}
								echo '<script>cargarLocNac('.$fk_provincia.')</script>';
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_locnac" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Loc. Nac.:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<select name="gra_locnac" class="form-control input-sm" id="gra_locnac" title="Seleccione la localidad de nacimiento del graduado">
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_provtrab" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Prov. Trab.:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<select name="gra_provtrab" class="form-control input-sm" id="gra_provtrab" onchange="if(this.value != 0){cargarLocTrab(this.value)};" title="Seleccione la provincia d&oacute;nde trabaja el graduado">
						<option value="0">Seleccione una provincia...</option>
							<?php
								$provtrab=traerSql('id, nombre','provincia', NULL);
								while($rowProvTrab=pg_fetch_array($provtrab)){
									if ($id_Alumno != 0) {
										$sql_prov = traerSql('fk_provincia', 'localidad', 'id ='.$gra_loctrab);
										$rowIdProv=pg_fetch_array($sql_prov);
											$fk_provincia = $rowIdProv['fk_provincia'];
										if ($fk_provincia == $rowProvTrab['id']){
											echo "<option value=".$rowProvTrab['id']." selected>".$rowProvTrab['nombre']."</option>";
											//$fk_provincia = $rowIdProv['fk_provincia'];
										}else{
											echo "<option value=".$rowProvTrab['id'].">".$rowProvTrab['nombre']."</option>";
										}
									}else{
										echo "<option value=".$rowProvTrab['id'].">".$rowProvTrab['nombre']."</option>";
									}
								}
								echo '<script>cargarLocTrab('.$fk_provincia.')</script>';
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_loctrab" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Loc. Trab.:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<select name="gra_loctrab" class="form-control input-sm" id="gra_loctrab" title="Seleccione la localidad d&oacute;nde trabaja el graduado">
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_provive" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Prov. Vive:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<select name="gra_provive" class="form-control input-sm" id="gra_provive" onchange="if(this.value != 0){cargarLocVive(this.value)};" title="Seleccione la provincia d&oacute;nde vive el graduado">
						<option value="0">Seleccione una provincia...</option>
							<?php
								$provive=traerSql('id, nombre','provincia', NULL);
								while($rowProVive=pg_fetch_array($provive)){
									if ($id_Alumno != 0) {
										$sql_prov = traerSql('fk_provincia', 'localidad', 'id ='.$gra_locvive);
										$rowIdProv=pg_fetch_array($sql_prov);
											$fk_provincia = $rowIdProv['fk_provincia'];
										if ($fk_provincia == $rowProVive['id']){
											echo "<option value=".$rowProVive['id']." selected>".$rowProVive['nombre']."</option>";
											//$fk_provincia = $rowIdProv['fk_provincia'];
										}else{
											echo "<option value=".$rowProVive['id'].">".$rowProVive['nombre']."</option>";
										}
									}else{
										echo "<option value=".$rowProVive['id'].">".$rowProVive['nombre']."</option>";
									}
								}
								echo '<script>cargarLocVive('.$fk_provincia.')</script>';
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_locvive" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Loc. Vive:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<select name="gra_locvive" class="form-control input-sm" id="gra_locvive" title="Seleccione la localidad d&oacute;nde vive el graduado">
						</select>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<label for="gra_calle" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Calle:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<input class="form-control input-sm" name="gra_calle" id="gra_calle" type="text" value="<?php echo $gra_calle; ?>" maxlength="40" title="Ingrese la calle del graduado" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_nrocalle" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Nro.:</label>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<input class="form-control input-sm" name="gra_nrocalle" id="gra_nrocalle" type="text" pattern="[0-9]{0,5}" value="<?php echo $gra_nrocalle; ?>" maxlength="5" title="Ingrese el n&uacute;mero de la calle"/>
					</div>

					<label for="gra_depto" class="control-label col-xs-2 col-sm-1 col-md-1 col-lg-1 text-right">Depto.:</label>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<input class="form-control input-sm" name="gra_depto" id="gra_depto" type="text" pattern="[0-9]{0,3}" value="<?php echo $gra_depto; ?>" maxlength="3" title="Ingrese el depto del domicilio" />
					</div>

					<label for="gra_piso" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">Piso:</label>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<input class="form-control input-sm" name="gra_piso" id="gra_piso" type="text" pattern="[0-9]{0,3}" value="<?php echo $gra_piso; ?>" maxlength="3" title="Ingrese el piso del domicilio"/>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_mail1" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Mail 1:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<input class="form-control input-sm" name="gra_mail1" id="gra_mail1" type="email" value="<?php echo $gra_mail1; ?>" maxlength="60" title="Ingrese el mail del graduado" />
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<label for="gra_mail2" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Mail 2:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<input class="form-control input-sm" name="gra_mail2" id="gra_mail2" type="email" value="<?php echo $gra_mail2; ?>" maxlength="60" title="Ingrese el mail secundario del graduado"/>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_facebook" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Facebook:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<input class="form-control input-sm" name="gra_facebook" id="gra_facebook" type="text" value="<?php echo $gra_facebook; ?>" maxlength="40" title="Ingrese el facebook del graduado" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_twitter" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Twitter:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<input class="form-control input-sm" name="gra_twitter" id="gra_twitter" type="text" value="<?php echo $gra_twitter; ?>" maxlength="20" title="Ingrese el twitter del graduado"/>
					</div>
				</div>
			</div>

			<!--ALERTAS DE ERRORES --------------------------------------------------------------------------  -->
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<div class="alert alert-danger text-center" id="a_vacio">
						<strong>Atenci&oacute;n:</strong> Debe cargar los tres datos del tel&eacute;fono.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<div class="alert alert-danger text-center" id="a_carac">
						<strong>Atenci&oacute;n:</strong> Ingrese la caracter&iacute;stica (sin 0) del n&uacute;mero de tel&eacute;fono o celular.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<div class="alert alert-danger text-center" id="a_tel">
						<strong>Atenci&oacute;n:</strong> Ingrese el n&uacute;mero (sin el 15) de tel&eacute;fono o celular y debe contener m&iacute;nimo de 6 d&iacute;gitos y 8 como m&aacute;ximo.
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<div class="alert alert-danger text-center" id="a_duenio">
						<strong>Atenci&oacute;n:</strong> Ingrese a quien pertenece el n&uacute;mero cargado.
					</div>
				</div>
			</div>

			<!-------------------------------------------------------------------------------------  -->

			<div class="row">
				<div class="form-group" id="error">
					<label for="gra_caractel" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Tel.:</label>
					<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
						<input class="form-control input-sm" name="gra_caractel" id="gra_caractel" type="text" onkeyup="sacarColor('#error','#a_carac')" onkeydown="return soloNumero(event);" onblur="validarLargoTel('#gra_caractel','#a_carac',2,4);" pattern="[1-9]{0,4}" value="<?php echo $gra_caractel; ?>" maxlength="4" title="Ingrese la caracter&iacute;stica (sin 0) del n&uacute;mero de tel&eacute;fono o celular"/>
					</div>
					<div class="col-xs-2 col-sm-3 col-md-2 col-lg-2">
						<input class="form-control input-sm" name="gra_nrotel" id="gra_nrotel" type="text" onkeyup="sacarColor('#error','')" onkeydown="return soloNumero(event);" onblur="validarLargoTel('#gra_nrotel','#a_tel',6,8);" pattern="[0-9]{0,8}" value="<?php echo $gra_nrotel; ?>" maxlength="8" title="Ingrese el n&uacute;mero (sin el 15) de tel&eacute;fono o celular"/>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-5 col-lg-5">
						<input class="form-control input-sm" name="gra_duenio" id="gra_duenio" type="text" onkeyup="sacarColor('#error','#a_duenio')" pattern="[0-9]{0,8}" placeholder="Due&ntilde;o/a del tel&eacute;fono cargado" value="<?php echo $gra_duenio; ?>" maxlength="30" title="Ingrese a quien pertenece el n&uacute;mero cargado"/>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<button type="button" class="btn1 btn-primary btn-xs btn_add" onclick="addTel()" title="Haga click para agregar un tel&eacute;fono"><i class="fa fa-plus-circle fa-md"></i></button>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<center>
						<table class="table table-striped table-condensed table-bordered table-hover" id="tel_cargados">
						</table>
					</center>
				</div>
			</div>

			<!--ALERTAS DE ERRORES --------------------------------------------------------------------------  -->

			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<div class="alert alert-danger text-center" id="a_foto">
						<strong>Atenci&oacute;n:</strong> debe cargar un archivo "jpg", "jpeg" o "png".
					</div>
				</div>
			</div>

			<!-------------------------------------------------------------------------------------  -->

			<div class="row">
				<div class="form-group">
					<label for="gra_foto" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Foto:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<input class="input-sm" name="gra_foto" id="gra_foto" type="file" onchange="validarArchivo();" title="Cargue una foto del graduado" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_peraca" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Perfil Aca.:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<textarea class="form-control input-sm" name="gra_peraca" id="gra_peraca" value="" rows="5" title="Ingrese el perfil acad&eacute;mico del graduado"><?php echo $gra_peraca; ?></textarea>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="gra_perlab" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 text-left">Perfil Lab.:</label>
					<div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
						<textarea class="form-control input-sm" name="gra_perlab" id="gra_perlab" value="" rows="5" title="Ingrese el perfil laboral del graduado"><?php echo $gra_perlab; ?></textarea>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<a href="listadoAlumno.php"><button type="button" class="btn btn-default"><i class="fa fa-arrow-left fa-lg"></i>&nbsp;&nbsp;Atr&aacute;s</button></a>
					<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i>&nbsp;&nbsp;Guardar</button>
				</div>
			</div>
		</div>
</form>
</body>
</html>