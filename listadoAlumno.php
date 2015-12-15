<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<?php include_once "basicos/head.html"; ?>
		<title>Listado Graduados</title>
		<script defer>
			//var listaGraduados = '';
			var listaGraduados = {};
			var separador = '/--/';
			var separador2 = '/--/--/';
			var separador3 = '/--/--/--/';
			var foto = '';

			function filtraData(from){
				listaGraduados = {};
				var parametros = {
		            "cbo_grado" : $('#cbo_grado').val(),
		            "cbo_carrera" : $('#cbo_carrera').val(),
		            "cbo_docente" : $('#cbo_docente').val()

		    	};

				$.ajax({
					type: "POST",
					url: "ajaxListGraduado.php",
					data: parametros,
					async: false,
					success:  function (response) { //Funcion que ejecuta si todo pasa bien. El response es los datos que manda el otro archivo
						cargarGraduado(response);
						controlBusqueda();
		            },
					error: function (msg) {
						alert('Error al realizar la consulta.');
						//$('#error_cod').attr('hidden', false);
						//alert("No se pudo validar el usuario. Contactarse con el equipo de mantenimiento");
					}
				});
			}

			var datos = '';
			var cont = '';
			function cargarGraduado(datosAjax){
				datos = datosAjax.split(separador3);
				cont = datos[1].split(separador2);
				for(var i = 0; i < datos[0]; i++){
					listaGraduados[i] = cont[i];
				}
			}

			function controlBusqueda()
			{
				if(($('#palabra').val()) == '' || ($('#palabra').val()) == null)
				{
					//filtraData();
					mostrarGraduado(false);
				}
				else
				{
					mostrarGraduado(true);
				}
			}

			function mostrarGraduado(busqueda)
			{
				var graduadosToAdd = '';
				var graduadosToAdd1 = '';
				var noHay = '';
				var graduadoEncontrado = false;
				var contar = 0;

				if(busqueda == false)
				{	
					$.each(listaGraduados, function(key,value){
						var vCampos = value.toLowerCase().split(separador);
						contar++;
						if (vCampos[1] == '' || vCampos[1] == 'fotos/') {
							if (vCampos[8] != 'f') {
								foto = '<i class="fa fa-user fa-2x user2"></i>';
							}else{
								foto = '<i class="fa fa-user fa-2x user"></i>';
							}
						}else{
							foto = '<img src="'+vCampos[1]+'" width="50" height="50">';
						}
						if (vCampos[8] != 'f') {
							ojo = '<i class="fa fa-eye fa-2x ojo"></i>';
							actualizar = '<i class="fa fa-refresh fa-2x actualizar"></i>';
							graduadosToAdd += '<tr class="docente"><td class="text-center">'+contar+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+foto+'</a></td><td class="text-center">'+vCampos[2]+', '+vCampos[3]+'</td><td class="text-center">'+vCampos[4]+'</td><td class="text-center">'+vCampos[5]+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+ojo+'</a></td><td class="text-center"><a href="listadoSeguimiento.php?idAlumno='+vCampos[6]+'">'+actualizar+'</a></td></tr>';
						}else{
							ojo = '<i class="fa fa-eye fa-2x"></i>';
							actualizar = '<i class="fa fa-refresh fa-2x"></i>';
							graduadosToAdd += '<tr><td class="text-center">'+contar+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+foto+'</a></td><td class="text-center">'+vCampos[2]+', '+vCampos[3]+'</td><td class="text-center">'+vCampos[4]+'</td><td class="text-center">'+vCampos[5]+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+ojo+'</a></td><td class="text-center"><a href="listadoSeguimiento.php?idAlumno='+vCampos[6]+'">'+actualizar+'</a></td></tr>';
						}
					});
				}else{
					palabraABuscar = ($('#palabra').val()).toLowerCase();
					//graduadoEncontrado = false;
					$.each(listaGraduados, function(key,value){
						var vCampos = value.toLowerCase().split(separador);
						for(var i = 0; i < vCampos.length; i++)
						{
							if(i != 0)
							{
								if(vCampos[2].indexOf(palabraABuscar) != -1 || vCampos[3].indexOf(palabraABuscar) != -1 || vCampos[7].indexOf(palabraABuscar) != -1)
								{
									//graduadoEncontrado = true;

									contar++;
									if (vCampos[1] == '' || vCampos[1] == 'fotos/') {
										if (vCampos[8] != 'f') {
											foto = '<i class="fa fa-user fa-2x user2"></i>';
										}else{
											foto = '<i class="fa fa-user fa-2x user"></i>';
										}
									}else{
										foto = '<img src="'+vCampos[1]+'" width="50" height="50">';
									}
									if (vCampos[8] != 'f') {
										ojo = '<i class="fa fa-eye fa-2x ojo"></i>';
										actualizar = '<i class="fa fa-refresh fa-2x actualizar"></i>';
										graduadosToAdd += '<tr class="docente"><td class="text-center">'+contar+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+foto+'</a></td><td class="text-center">'+vCampos[2]+', '+vCampos[3]+'</td><td class="text-center">'+vCampos[4]+'</td><td class="text-center">'+vCampos[5]+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+ojo+'</a></td><td class="text-center"><a href="listadoSeguimiento.php?idAlumno='+vCampos[6]+'">'+actualizar+'</a></td></tr>';
									}else{
										ojo = '<i class="fa fa-eye fa-2x"></i>';
										actualizar = '<i class="fa fa-refresh fa-2x"></i>';
										graduadosToAdd += '<tr><td class="text-center">'+contar+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+foto+'</a></td><td class="text-center">'+vCampos[2]+', '+vCampos[3]+'</td><td class="text-center">'+vCampos[4]+'</td><td class="text-center">'+vCampos[5]+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+ojo+'</i></a></td><td class="text-center"><a href="listadoSeguimiento.php?idAlumno='+vCampos[6]+'">'+actualizar+'</a></td></tr>';
									}
									break;
								}
							}
						}
						// if(graduadoEncontrado == true)
						// {
						// 	contar++;
						// 	if (vCampos[1] == '') {
						// 		foto = '<i class="fa fa-user fa-2x user"></i>';
						// 	}else{
						// 		foto = '<img src="'+vCampos[1]+'" width="50" height="50">';
						// 	}
						// 	graduadosToAdd += '<tr><td class="text-center">'+contar+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+foto+'</a></td><td class="text-center">'+vCampos[2]+', '+vCampos[3]+'</td><td class="text-center">'+vCampos[4]+'</td><td class="text-center">'+vCampos[5]+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'"><i class="fa fa-eye fa-2x"></i></a></td><td class="text-center"><a href="listadoSeguimiento.php?idAlumno='+vCampos[6]+'"><i class="fa fa-refresh fa-2x"></i></a></td></tr>';
						// }
						//graduadosToAdd += '<tr><td class="text-center" colspan="7">No hay registros</td></tr>';
						//$('#filtroConsulta').html(graduadosToAdd);
					});
				}
				$('#filtroConsulta').html(graduadosToAdd);
			}


			$(document).ready(function() {
				filtraData();
				//controlBusqueda();
			});
		</script>
	</head>
	<body class="container-fluid">
		<div class="separar"></div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
				<h3 class="text-center">
					<select name="cbo_grado" class="form-control" id="cbo_grado" onchange="filtraData();" title="Filtrar por nivel de carrera" >
						<option value="0">Filtrar por nivel...</option>
						<?php
							include_once "conexion.php";
							include_once "libreria.php";

							$nivcar = traerSql('id_nivel_carrera,nombre_nivel_carrera','nivel_carrera ORDER BY id_nivel_carrera','');
							while($rowNivCar=pg_fetch_array($nivcar)){
								echo '<option value="'.$rowNivCar['id_nivel_carrera'].'" class="text-center">'.$rowNivCar['nombre_nivel_carrera'].'</option>';
							}
						?>
					</select>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
				<h3 class="text-center">
					<select name="cbo_carrera" class="form-control" id="cbo_carrera" onchange="filtraData();" title="Filtrar por carrera" >
						<option value="0">Filtrar por carrera...</option>
						<?php
							$car = traerSql('id_carrera,nombre_carrera','carrera ORDER BY id_carrera','');
							while($rowCar=pg_fetch_array($car)){
								echo '<option value="'.$rowCar['id_carrera'].'" class="text-center">'.$rowCar['nombre_carrera'].'</option>';
							}
						?>
					</select>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
				<h3 class="text-center">
					<select name="cbo_docente" class="form-control" id="cbo_docente" onchange="filtraData();" title="Filtrar por cargo" >
						<option value="0">Filtrar por cargo...</option>
						<option value="1">Alumno</option>
						<option value="2">Docente</option>
					</select>
				</h3>
			</div>
		</div>
		<!-- <form class="form-horizontal" id="busqueda" name="buscador" action="busqueda.php" method="post"> -->
		<div class="row separar_search">
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-btn" title="Presione aqu&iacute; para buscar">
							<button class="btn btn-primary lupa" type="submit"><i class="fa fa-search fa-lg"></i></button>
						</span>
						<input type="text" class="form-control" placeholder="Buscar por Nombre, Apellido o DNI" name="palabra" onchange="controlBusqueda()" onKeyUp="controlBusqueda()" id="palabra" required autofocus />
					</div>
				</div>
			</div>
		</div>

		<div class="text-center">
			<a href="imprimirListadoGraduados.php?control=0">
				<input type="button" class="btn btn_separar btn-primary" value="Imprimir" />
			</a>
			<a href="excelListadoGraduados.php?control=0">
				<input type="button" class="btn btn_separar btn-default" value="Excel" />
			</a>
		</div>

		<div class="text-left">
			<h4 class="cartel_docente"><i class="fa fa-square fa-lg"></i>Docente</h4>						
		</div>

		<?php
		
		$contador = 0;
		//$val = traerSql('id_alumno,nombre_alumno,apellido_alumno,foto_alumno,carrera.nombre_carrera,nombre_nivel_carrera,gra_docente','alumno INNER JOIN carrera ON carrera.id_carrera = alumno.carrera_alumno INNER JOIN nivel_carrera ON carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC','');
		echo '<div class="table-responsive">';
			echo '<table class="table table-striped table-condensed table-responsive table-bordered table-hover">';
			//echo '<table class="text-center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
				echo '<thead>';
					echo '<tr>';
						echo '<th colspan="7" class="text-center"><h3>Listado de Graduados</h3></th>';
					echo '</tr>';
					//echo '<tr>';
						//echo '<th id="titulo3" colspan="7" class="text-center"><a href="imprimirListadoGraduados.php?control=0"><input type="button" class="btn btn-default" value="Imprimir"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="excelListadoGraduados.php?control=0"><input type="button" class="btn btn-default" value="Excel"/></a></th>';
					//echo '</tr>';
					echo '<tr>';
						echo '<th class="text-center">&nbsp;</th>';
						echo '<th class="text-center">Foto</th>';
						echo '<th class="text-center">Alumno</th>';
						echo '<th class="text-center">Nivel Carrera</th>';
						echo '<th class="text-center">Carrera</th>';
						echo '<th class="text-center">Ver Graduado</th>';
						echo '<th class="text-center">Seguimiento</th>';
					echo '</tr>';
				echo '</thead>';
				$contador = $contador + 1;
				echo '<tbody id="filtroConsulta">';
			// while($row=pg_fetch_array($val)){
			// 	$contador = $contador + 1;
			// 	echo '<tbody id="filtroConsulta">';
			// 		echo '<tr>';
			// 			echo '<td class="text-center">'.$contador.'</td>';
			// 			if ($row['foto_alumno'] != ''){
			// 				echo '<td class="text-center" cellpadding="0"><a href="registrarGraduado.php?idAlumno='.$row['id_alumno'].'"><img src='.$row['foto_alumno'].' width="50" height="50"></a></td>';
			// 			}else{
			// 				echo '<td class="text-center"><a href="registrarGraduado.php?idAlumno='.$row['id_alumno'].'"><i class="fa fa-user fa-2x user"></i></a></td>';
			// 			}
			// 			echo '<td class="text-center">'.$row['apellido_alumno'].', '.$row['nombre_alumno'].'</td>';
			// 			echo '<td class="text-center">'.$row['nombre_nivel_carrera'].'</td>';
			// 			echo '<td class="text-center">'.$row['nombre_carrera'].'</td>';
			// 			echo '<td class="text-center"><a href="verAlumno.php?idAlumno='.$row['id_alumno'].'"><i class="fa fa-eye fa-2x"></i></a></td>';
			// 			echo '<td class="text-center"><a href="listadoSeguimiento.php?idAlumno='.$row['id_alumno'].'"><i class="fa fa-refresh fa-2x"></i></a></td>';
			// 		echo '</tr>';
			// 	}
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
		?>
		<div class="text-center">
			<a href="imprimirListadoGraduados.php?control=0">
				<input type="button" class="btn btn-primary" value="Imprimir" />
			</a>
			<a href="excelListadoGraduados.php?control=0">
				<input type="button" class="btn btn-default" value="Excel" />
			</a>
			<a href="busqueda.php">
				<input type="button" class="btn btn-warning" value="Atr&aacute;s" />
			</a>
		</div>
	</body>
</html>