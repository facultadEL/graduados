<?php
	//conexion facu
	//$conn = pg_connect("host=localhost port=5432 user=extension password=newgenius dbname=graduados") or die("Error de conexion.".pg_last_error());

	//conexion local
	$conn = pg_connect("host=localhost port=5432 user=postgres password=postgres dbname=graduados") or die("Error de conexion.".pg_last_error());

$htmlProvincias = '<option value="0">Seleccione la ciudad</option>';

$idProvincia = $_POST['idProvincia'];

//$sql = traerSql('*', 'localidad', 'fk_provincia='.$idProvincia);
$sql = pg_query("SELECT * FROM localidad WHERE fk_provincia = $idProvincia ORDER BY nombre");
while($rowCiudad = pg_fetch_array($sql)){
	//Creo el html a devolver
	$htmlProvincias .= '<option value="'.$rowCiudad['id'].'">'.$rowCiudad['nombre'].'</option>';
}
//Con el echo devuelvo el dato al otro archivo
echo $htmlProvincias;

pg_close($conn);
?>