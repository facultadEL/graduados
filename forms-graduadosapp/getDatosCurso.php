<?php

include_once 'conexionApp.php';

$id = $_REQUEST['id'];

$c = "SELECT * FROM curso WHERE id='$id';";
$s = pg_query($c);

$outJson = "[";

while($r = pg_fetch_array($s))
{
    if($outJson != "[")
    {
        $outJson .= ',';
    }
    
}

$outJson .= "]";

echo $outJson;

?>