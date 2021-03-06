<html>
<head>
	<title> Cursos </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/estilos.css">
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script>
	
	var idCurso = -1;
	
	function getCarreras()
	{
		$.ajax({
			type:"POST",
			url:"../getCarreras.php",
			success:function(response)
			{
				var r = JSON.parse(response);
				successGetCarreras(r);
			},
			error: function(msg)
			{
				alert('No se pudieron traer las carreras');
			}
		});
	}
	
	function successGetCarreras(data)
	{
		var htmlOptions = `<option value="99">Todas las carreras</option>`;
		for(var i = 0; i < data.length; i++)
		{
			htmlOptions += `<option value="${data[i].id}">${data[i].nombre}</option>`;
		}
		
		$('#dirigidoa').html(htmlOptions);
		$('#aplica1').html(htmlOptions);
		$('#aplica2').html(htmlOptions);
		$('#aplica3').html(htmlOptions);
	}
	
	function setCurso(i)
	{
		idCurso = parseInt(i);
	}
	
	function getDatosCurso()
	{
		if(idCurso != -1)
		{
			var param = {
				"id":idCurso
			};
			
			$.ajax({
				type:"POST",
				url:"getDatosCurso.php",
				data:param,
				success:function(response)
				{
					var r = JSON.parse(response);
					successGetDatosCurso(r);
				},
				error: function(msg)
				{
					alert('Error al traer los datos del curso');
				}
			})
		}
	}
	
	function successGetDatosCurso(data)
	{
		
	}
	
	$(document).ready(function(){
	   
		getCarreras();
		getDatosCurso();
		
	});
		
	</script>
</head>
<?php

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '-1';

echo "<script>setCurso('".$id."');</script>";

?>
<body>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title text-center">Graduados</h3>
		</div>

		<div class="panel-body panel_body">
			<div class="row" id="headerSuperior">
				<legend class="text-center"><h4 class="text-center">Nuevo Curso</h4></legend>
			</div>
		</div>
		<div class="container">
			<form role="form">
				<div class="form-group">
					<label for="nombreCurso">Curso:</label>
					<input type="text" class="form-control" id="nombreCurso" placeholder="Ingrese el nombre del curso">
				</div>
				<div class="form-group">
					<label for="duracion">Duración:</label>
					<input type="number" class="form-control" id="duracion" min="1" placeholder="Ingrese la duración en clases">
				</div>
				<div class="form-group">
					<label for="dYh">Días y Horarios:</label><br>
					<textarea class="form-control" id="dYh" cols="50" rows="4" placeholder="Ingrese el/los día/s y horario/s de cursado"></textarea>
				</div>
				<!-- se elige el día y el horario de cursado -->
				<div class="form-group">
					<label for="detalleCurso">Detalle:</label><br>
					<textarea  class="form-control" id="detalleCurso" rows="4" cols="50" placeholder="Ingrese una pequeña descripción del curso"></textarea>
				</div>
				<div class="form-group">
					<label for="dirigidoa">Dirigido a:</label>
					<select id="dirigidoa" name="dirigidoa" class="form-control">
					</select>
				</div>
				<div class="form-group">
					<label for="aplica1">Aplica a:</label>
					<select id="aplica1" name="aplica1" class="form-control">
					</select>
				</div>
				<div class="form-group">
					<label for="aplica2">Aplica a:</label>
					<select id="aplica2" name="aplica2" class="form-control">
					</select>
				</div>
				<div class="form-group">
					<label for="aplica3">Aplica a:</label>
					<select id="aplica3" name="aplica3" class="form-control">
					</select>
				</div>
				<button type="submit" class="btn btn-default">Guardar</button>
			</form>
		</div>

	</div>
</div>

</body>
</html>