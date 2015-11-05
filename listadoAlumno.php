<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<?php include_once "basicos/head.html"; ?>
		<title>Listado Graduados</title>
		<script defer>
			function filtraData(from){

				var parametros = {
		            "from" : from,
		            "cbo_grado" : $('#cbo_grado').val(),
		            "cbo_carrera" : $('#cbo_carrera').val()
		    	};

				$.ajax({
					type: "POST",
					url: "ajaxListGraduado.php",
					data: parametros,
					async: false,
					success:  function (response) { //Funcion que ejecuta si todo pasa bien. El response es los datos que manda el otro archivo
						$('#filtroConsulta').html(response);
		            },
					error: function (msg) {
						alert('Error al realizar la consulta.');
						//$('#error_cod').attr('hidden', false);
						//alert("No se pudo validar el usuario. Contactarse con el equipo de mantenimiento");
					}
				});
			}


			$(document).ready(function() {
				filtraData();
			});

			// $(document.body).on('hidden.bs.modal', function () {
			//     $('#login-modal').removeData('bs.modal')
			// });
		</script>
	</head>
	<body class="container-fluid">
		<div class="separar"></div>
		<form class="form-horizontal" id="busqueda" name="buscador" action="busqueda.php" method="post">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2">
				<div class="form-group text-center">
					<div class="input-group">
						<span class="input-group-btn" title="Presione aqu&iacute; para buscar">
							<button class="btn btn-primary lupa" type="submit"><i class="fa fa-search fa-lg"></i></button>
						</span>
						<input type="text" class="form-control" placeholder="Buscar por..." name="palabra" id="palabra" required autofocus />
					</div>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
				<h3 class="text-center">
					<select name="cbo_grado" class="form-control" id="cbo_grado" onchange="filtraData('1');" title="Filtrar por nivel de carrera" >
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
					<select name="cbo_carrera" class="form-control" id="cbo_carrera" onchange="filtraData('2');" title="Filtrar por carrera" >
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
		<div class="text-center">
			<a href="imprimirListadoGraduados.php?control=0">
				<input type="button" class="btn btn_separar btn-primary" value="Imprimir" />
			</a>
			<a href="excelListadoGraduados.php?control=0">
				<input type="button" class="btn btn_separar btn-default" value="Excel" />
			</a>
		</div>
		<?php
		
		$contador = 0;
		$val = traerSql('id_alumno,nombre_alumno,apellido_alumno,foto_alumno,carrera.nombre_carrera,nombre_nivel_carrera','alumno INNER JOIN carrera ON carrera.id_carrera = alumno.carrera_alumno INNER JOIN nivel_carrera ON carrera.nivel_carrera_fk = nivel_carrera.id_nivel_carrera ORDER BY id_nivel_carrera,id_carrera,apellido_alumno,nombre_alumno,id_alumno ASC','');
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