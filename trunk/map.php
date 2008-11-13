<?
session_start();

require_once "db.php";
require_once "funciones.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : <? echo MAPS; ?></title>
	<link rel="stylesheet" href="estilos/iphone.css" />	
	
</head>
<?
$map_id=sql_quote($_GET["id"]);
$server_id=sql_quote($_GET["server_id"]);

?>

<body>
	
	<div id="header">
		<h1><? echo MAP; ?></h1>
		<a href="mapas.php" id="backButton" class="nav"><? echo BACK; ?></a>
		<a href="servidor.php?server_id=<? echo $server_id?>" id="action" class="nav Action"><? echo SERVER; ?></a>
	</div>

<h1>
<? 

if(!is_numeric($map_id)) 
	$map_id="";
	
if(!is_numeric($server_id)) 
	$server_id="";

$map_name=get_map_name($link,$map_id);

echo $map_name;

?>
</h1>


<?


$query="SELECT device_id,name,ip FROM device WHERE map_id='$map_id' AND server_id='$server_id' and delete_time='infinity' ORDER BY name ASC";

$result = pg_query($link,$query) or die(pg_last_error());
$row = pg_fetch_assoc($result);

if($row["device_id"]!="") {
	echo "<ul>\n";
	
	do {
		$device_id=$row["device_id"];
		$name=$row["name"];
		$ip=$row["ip"];
	
			echo "<li class=\"arrow\"><a href=\"dispositivo.php?device_id=$device_id&map_id=$map_id&server_id=$server_id\">$name</a>$ip</li>\n";	
	
	} while ($row = pg_fetch_array($result));
	
	echo "</ul>\n";

} else {
	?>
	<ul class="individual">
		<li>No hay dispositivos en este mapa</li>
	</ul>
	
	<?
}

?>





<? print_footer(); ?>


</body>
</html>