<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<title>Registro de Graduado</title>
	<?php include_once "basicos/head.html"; ?>
	<script defer>
		function validateData(){

			var parametros = {
                "nrodoc" : $('#nrodoc').val()
        	};

   			var pasa;
			$.ajax({
				type: "POST",
				url: "validaCarga.php",
				data: parametros,
				async: false,
				success:  function (response) { //Funcion que ejecuta si todo pasa bien. El response es los datos que manda el otro archivo
                        if(response == '1'){
                        	$('#form').submit();
                        }else{
                        	if(response == '2' || response == '0'){
                        		$('#a_existe').attr('hidden', false);
                        		$('#gra_existe').val(response);
                        		$('#nrodoc').val('');
                        		//break;
                        	}
                        	// switch(response){
                        	// 	case '0':
                        	// 	case '2':
                        	// 		alert("Usuario existente");
                        	// 		$('#nrodoc').val(response);
                        	// 		//$('#nrodoc').focus();
                        	// 		break;
                        	// }
                        }
                },
				error: function (msg) {
					alert("No se pudo validar el nro. de documento. Contactarse con Secretaría de Extensión");
				}
			});
		}

		function controlVacio(nombreSelector){
			if($.trim($(nombreSelector).val()) == ''){
				if ($('#gra_existe').val() == '2') {
					$('#a_existe').attr('hidden', false);
					$('#gra_existe').val('')
				}else{
					$('#a_vacio').attr('hidden', false);
				}
	        	// $(nombreSelector).css('border-color','red');
	        	// $(nombreSelector).css('outline','0px');
        		
		        $(nombreSelector).focus();

	    	    return false;
	    	}
	    	return true;
		}

		function pulsar(e){
			if(e.keyCode == 13){
				if(!controlVacio('#nrodoc')) return false;

				validateLong();
			}
		}

		function btn_mouse(){
			if(!controlVacio('#nrodoc')) return false;

			validateLong();
		}

		function validateLong(){
			largo = $('#nrodoc').val().length;

			if (largo < 7){
				$('#a_largo').attr('hidden', false);
				$('#nrodoc').focus();
			}else{
				$('#a_largo').attr('hidden', true);
				validateData();
			}
		}

		// var numbers = [9,49,50,51,52,53,54,55,56,57,48,97,98,99,100,101,102,103,104,105,8,10,96]
		// function soloNumero(e){
			
		// 	if($.inArray(e.keyCode,numbers)!=-1){
		// 		return true;
		// 	}
		// 	return false;
		// }


		function ocultar_alertar(){
			$('#a_existe').attr('hidden', true);
			$('#a_vacio').attr('hidden', true);
			$('#a_largo').attr('hidden', true);
		}

		$(document).ready(function() {
			ocultar_alertar();
		});
	</script>
<body class="separar">
<form name="validarDNI" id="form" action="registrarGraduado.php" method="post" id="form_VDNI" class="form-horizontal">
	<div class="container">
		<header>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<legend><h4>Ingrese el Nro. de Documento del Graduado a registrar</h4></legend>
				</div>
			</div>
		</header>
		<div class="panel-body">
			
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<div class="alert alert-danger text-center" id="a_existe">
						<strong>Atenci&oacute;n:</strong> el graduado ya existe.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<div class="alert alert-danger text-center" id="a_vacio">
						<strong>Atenci&oacute;n:</strong> debe ingresar un n&uacute;mero de documento.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<div class="alert alert-danger text-center" id="a_largo">
						<strong>Atenci&oacute;n:</strong> debe ingresar un n&uacute;mero de documento con m&iacute;nimo 7 d&iacute;gitos.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<label for="numDNI" class="control-label col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-left">Nro. Doc.:</label>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
						<!-- <input class="form-control input-sm" name="numDNI" id="nrodoc" type="text" value="" pattern="([0-9]{1}|[0-9]{2})[0-9]{3}[0-9]{3}" maxlength="8" title="Ingrese s&oacute;lo n&uacute;meros" autofocus required onkeydown="pulsar(event);ocultar_alertar();" /> -->
						<input class="form-control input-sm" name="numDNI" id="nrodoc" type="text" value="" maxlength="8" title="Debe cargar un n&uacute;mero de documento" autofocus required onkeydown="pulsar(event);" onkeypress="ocultar_alertar();" />
						<input name="gra_existe" id="gra_existe" type="hidden" value="" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<button type="submit" class="btn btn-default btn_siguiente btn-md" onclick="btn_mouse();"><i class="fa fa-floppy-o fa-lg"></i>&nbsp;&nbsp;Siguiente</button>
				</div>
			</div>
		</div>
	</div>
</form>
</body>
</html>
<!-- <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Listado de todos los productos registrados</h3>
        </div>
        
        <div class="panel-body"> -->