<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style type="text/css">
	label {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
	#tabla {background: #F2F2F2;}
	#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	#titulo2 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1.5em;}
	l3 {font-family: Cambria;color: #0040FF; text-transform: capitalize; font-size: 1.5em;}
	l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
	a { text-decoration:none }
</style>
<script>



</script>
</head>
<?php

$data = $_REQUEST['d'];
$vData = explode('/-/-/', $data);
$title = $vData[0];
$head = explode('/-/', $vData[1]);
echo $title;
echo $vData[1];

$cantCol = count($head);



?>
<body link="#000000" vlink="#000000" alink="#FFFFFF" >
<?php
echo '<table align="center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FAFAFA">';
		echo '<td id="titulo3" colspan="'.$cantCol.'" align="center"><l1>'.$title.'</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#C3C3C3">';
	for($i = 0; $i < $cantCol;$i++)
	{
		echo '<td align="center"><strong><label>'.$cantCol.'</label></strong></td>';	
	}
	echo '</tr>';
	for($i = 2; $i < count($vData);$i++)
	{
		echo '<tr>';
		$vA = explode('/-/',$vData[$i]);
		for($j = 0; $j < $cantCol;$j++)
		{
			echo '<td align="center"><l2>'.$vA[$j].'</l2></td>';
		}
		echo '</tr>';
	}
echo '</table>';
?>
</body>
</html>