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
						var vCampos = value.split(separador);
						var foto = vCampos[1];
						contar++;
						if (foto == '' || foto == 'fotos/') {
							if (vCampos[8] != 'f') {
								foto = '<i class="fa fa-user fa-2x user2"></i>';
							}else{
								foto = '<i class="fa fa-user fa-2x user"></i>';
							}
						}else{
							foto = '<img src="'+foto+'" width="50" height="50">';
						}
						var actualizarText = '';
						var clase = '';
						if(vCampos[8] != 'f')
						{
							actualizarText = 'actualizar';
							clase = ' class="docente"';
						}

						actualizar = '<i class="fa fa-refresh fa-2x '+actualizarText+'"></i>';
						eliminar = `<i class="fa fa-times fa-2x" onclick="deleteGraduado('${vCampos[6]}','${vCampos[2]}, ${vCampos[3]}')"></i>`;
						graduadosToAdd += '<tr'+clase+'><td class="text-center">'+contar+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+foto+'</a></td><td class="text-center">'+vCampos[2]+', '+vCampos[3]+'</td><td class="text-center">'+vCampos[4]+'</td><td class="text-center">'+vCampos[5]+'</td><td class="text-center">'+vCampos[7]+'</td><td class="text-center">'+vCampos[9]+'</td><td class="text-center">'+vCampos[10]+'</td><td class="text-center"><a href="listadoSeguimiento.php?idAlumno='+vCampos[6]+'">'+actualizar+'</a></td><td class="text-center">'+eliminar+'</td></tr>';
					});
				}else{
					palabraABuscar = ($('#palabra').val()).toLowerCase();
					//graduadoEncontrado = false;
					$.each(listaGraduados, function(key,value){
						var vCampos = value.split(separador);
						var foto = vCampos[1];
						for(var i = 0; i < vCampos.length; i++)
						{
							if(i != 0)
							{
								if(vCampos[2].toLowerCase().indexOf(palabraABuscar) != -1 || vCampos[3].toLowerCase().indexOf(palabraABuscar) != -1 || vCampos[7].toLowerCase().indexOf(palabraABuscar) != -1)
								{
									//graduadoEncontrado = true;

									contar++;
									if (foto == '' || foto == 'fotos/') {
										if (vCampos[8] != 'f') {
											foto = '<i class="fa fa-user fa-2x user2"></i>';
										}else{
											foto = '<i class="fa fa-user fa-2x user"></i>';
										}
									}else{
										foto = '<img src="'+foto+'" width="50" height="50">';
									}

									var actualizarText = '';
									var clase = '';
									if(vCampos[8] != 'f')
									{
										actualizarText = 'actualizar';
										clase = ' class="docente"';
									}
									actualizar = '<i class="fa fa-refresh fa-2x '+actualizarText+'"></i>';
									eliminar = `<i class="fa fa-times fa-2x" onclick="deleteGraduado('${vCampos[6]}','${vCampos[2]}, ${vCampos[3]}')"></i>`;
									graduadosToAdd += '<tr'+clase+'><td class="text-center">'+contar+'</td><td class="text-center"><a href="verAlumno.php?idAlumno='+vCampos[6]+'">'+foto+'</a></td><td class="text-center">'+vCampos[2]+', '+vCampos[3]+'</td><td class="text-center">'+vCampos[4]+'</td><td class="text-center">'+vCampos[5]+'</td><td class="text-center">'+vCampos[7]+'</td><td class="text-center">'+vCampos[9]+'</td><td class="text-center">'+vCampos[10]+'</td><td class="text-center"><a href="listadoSeguimiento.php?idAlumno='+vCampos[6]+'">'+actualizar+'</a></td><td class="text-center">'+eliminar+'</td></tr>';
									break;
								}
							}
						}
					});
				}
				$('#filtroConsulta').html(graduadosToAdd);
			}

			function deleteGraduado(idG, nombreG)
			{
				//console.log(idG)
				var resp = confirm(`¿Está seguro que desea eliminar a ${nombreG}?`);

				//console.log(resp);
				if(resp)
				{			
					var parametros = {
						'idGraduado':idG
					};

					$.ajax({
						type: "POST",
						url: "deleteGraduado.php",
						data: parametros,
						async: false,
						success:  function (response) { //Funcion que ejecuta si todo pasa bien. El response es los datos que manda el otro archivo
							var bitCheck = response[response.length - 1];
							//console.log(bitCheck);
							if(bitCheck == '0')
							{
								window.location.reload();
							}
							else
							{
								alert('No se ha podido eliminar el graduado');
							}
						},
						error: function (msg) {
							alert('Ha surgido un error a la hora de eliminar un graduado.');
						}
					});
				}
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

		
		
		<div class="table-responsive">
			<table class="table table-striped table-condensed table-responsive table-bordered table-hover">
				<thead>
					<tr>
						<th colspan="10" class="text-center"><h3>Listado de Graduados</h3></th>
					</tr>
					<tr>
						<th class="text-center">&nbsp;</th>
						<th class="text-center">Foto</th>
						<th class="text-center">Alumno</th>
						<th class="text-center">Nivel Carrera</th>
						<th class="text-center">Carrera</th>
						<th class="text-center">DNI</th>
						<th class="text-center">Email</th>
						<th class="text-center">Telefonos</th>
						<th class="text-center">Seguimiento</th>
						<th class="text-center">Eliminar</th>
					</tr>
				</thead>
				<tbody id="filtroConsulta">
				</tbody>
			</table>
		</div>
		
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