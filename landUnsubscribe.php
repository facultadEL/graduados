<html>
<head>
<title>Desuscripción</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/estilos.css">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/md5-min.js"></script>
<script>

function controlSubmit()
{
	desuscribir();

	return false;
}

function desuscribir()
{

	var id = $('#hiddenId').val();
	var motivo = $('#motivo').val();

	var param =
	{
		"id":id,
		"motivo":motivo
	};

	$.ajax({
		type:'POST',
		url:'unsubscribe.php',
		data:param,
		success: function(response)
		{
			if(response[(response.length - 1)] == "1")
			{
				alert('Se ha dado de baja correctamente');
			}
			else
			{
				alert('No se pudo dar de baja correctamente. Contactarse con Secretaría.');
			}
			$('#enviar').attr('disabled',true);
		},
		error: function(msg)
		{
			alert(`No se pudo dar de baja correctamente. Error: ${msg}`);
		}
	});
}

</script>
</head>
<?php
	
$id = $_REQUEST['i'];
$vMail = explode('/--/', $_REQUEST['to']);
$mail = $vMail[0].'@'.$vMail[1];
?>
<body>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Desuscripci&oacute;n</h3>
			</div>

			<div class="panel-body panel_body">
				<form name="f1" id="form2" action="" onsubmit="return controlSubmit();" method="post" class="form-horizontal col-xs-12 col-sm-12 col-md-12 col-lg-12 formNuevaVisita">

					<div class="row" id="headerSuperior">
						<legend class="text-center"><h4 class="text-center">Datos</h4></legend>
					</div>
					<input type="hidden" id="hiddenId" value="<?php echo $id;?>" />
					<div class="row">
						<div class="form-group">
							<label for="titulo" class="control-label col-xs-3 col-sm-2 col-md-2 col-lg-2">Mail:</label>
							<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10">
								<input class="form-control" name="mail" type="text" id="mail" value="<?php echo $mail; ?>" aria-describedby="helpBlock" disabled />
								<span id="helpBlock" class="help-block">Para darse de alta nuevamente, debe comunicarse con Secretar&iacute;a de Extensi&oacute;n.</span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label for="motivo" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2">Motivo:</label>
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<select class="form-control" name="motivo" id="motivo">
									<option value="Sin Motivo">Sin Motivo</option>
									<option value="Demasiados Mails">Demasiados mails recibidos</option>
									<option value="Sin Interes">No me interesa</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row" id="divSend">
						<div class="form-group">
							<p>
								<center>
									<button type="submit" id="enviar" class="btn btn-default submit" title="Enviar">Dar de Baja</button>
								</center>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>