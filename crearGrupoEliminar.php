<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="jquery-latest.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Nuevo Grupo</title>
	<style type="text/css">
		{font-family: Cambria }
			{font-family: Cambria }			
			form {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			#form {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			label {width: 10em;color: #336699; float: left;margin-right: 30px; font-family: Cambria; padding-left: .5em;}
			label.error {font-family: Cambria;float: none;vertical-align: top;color: red;padding-left: .5em;}
			
			labelG {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
			#tabla {background: #F2F2F2;}
			#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
			l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1.5em;}
			l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
			l3 {font-family: Cambria;color: #424242; padding: .12em;}
    </style>
		<script type="text/javascript">
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
			
			
		});
		
		function evaluaring(academico){
			document.f1.submit();
		}	
		</script>
</head>
<body>
<?php
$id_Grupo = $_REQUEST['idGrupo'];
$volver = $_REQUEST['volver'];
$modificar = $_REQUEST['modificar'];

include_once "conexion.php";
	if ($volver == 1){
		$nombre_grupo = $_REQUEST['nombre_grupo'];
		$descripcion_grupo = $_REQUEST['descripcion_grupo'];
	}else{
		$sqlGrupo = pg_query("SELECT * FROM grupo_alumnos WHERE id_grupo_alumnos = $id_Grupo");
		$rowGrupo = pg_fetch_array($sqlGrupo);
			$nombre_grupo = $rowGrupo['nombre_grupo'];
			$descripcion_grupo = $rowGrupo['descripcion_grupo'];
		}
?>
<div id="form">
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Listado de Grupos</FONT></legend>
<?php
$cadena= 'Desea eliminar el grupo seleccionado?';
	$utf= utf8_decode($cadena);
$val = pg_query("SELECT * FROM grupo_alumnos ORDER BY nombre_grupo ASC");
echo '<table align="center" cellspacing="1" cellpadding="4" width="100%" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF" width="100%">';
		echo '<td id="titulo3" colspan="4" align="center"><l1>Listado de Grupos</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000" width="100%">';
		echo '<td align="center" width="30%"><strong><labelG>Grupo</labelG></strong></td>';
		echo '<td align="center" width="60%"><strong><labelG>Descripci&oacute;n</labelG></strong></td>';
		echo '<td align="center" width="10%"><strong><labelG>Ver Grupo</labelG></strong></td>';
		echo '<td align="center" width="10%"><strong><labelG>Eliminar</labelG></strong></td>';
	echo '</tr>';
while($row=pg_fetch_array($val,NULL,PGSQL_ASSOC)){
	$id_GrupoE = $row['id_grupo_alumnos'];
	echo '<tr>';
		echo '<td align="center"><a href="?modificar=1&idGrupo='.$row['id_grupo_alumnos'].'"style="text-decoration:none"><l2>'.$row['nombre_grupo'].'</l2></td>';
		echo '<td align="center"><l3>'.$row['descripcion_grupo'].'</l3></td>';
		echo '<td align="center"><a href="verGrupoConsulta.php?idGrupo='.$row['id_grupo_alumnos'].'"><input type="image" src="verGrupo.png" width="40" height="40" value="Opciones" /></a></td>';
		echo '<td align="center"><a href="eliminarGrupo.php?idEliminarGrupo='.$id_GrupoE.'"><img src="eliminar2.png" width="20" height="20" name="Eliminar" value="Eliminar"/></a0></td>';
		//echo '<td align="center"><input type="image" onclick="confirmation()" src="eliminar2.png"  width="30" height="30" value="Eliminar"/></td>';
	echo '</tr>';
}
echo '</table>';
?>
<script type="text/javascript">
function confirmation() {
	var pregunta = confirm(<?php echo $utf;?>);
	if (pregunta){
		window.location = "eliminarGrupo.php?idEliminarGrupo=<?php echo $utf?>";
	}else{
		window.location = "crearGrupoConsulta.php";
	}
}		
</script>
<p>
<a href="crearGrupoConsulta.php"><center><input type="button" value="Atr&aacute;s"></center></a>
</p>
</fieldset>
</div>
</body>
</html>