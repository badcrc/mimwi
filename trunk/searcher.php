<?

require_once "db.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : <? echo SEARCH; ?></title>
	<link rel="stylesheet" href="estilos/iphone.css" />
</head>

<body id="normal">
	
	<div id="header">
		<h1><? echo SEARCH; ?></h1>
		<a href="search.php" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>



<?


$busqueda_equipo=sql_quote($_POST["equipo"]);
$busqueda_ip=sql_quote($_POST["ip"]);



if($busqueda_equipo!="") {
	$query="SELECT server_id,map_id,device_id,name,ip FROM device WHERE name ILIKE '%$busqueda_equipo%'";
} else if($busqueda_ip!="") {
	$query="SELECT server_id,map_id,device_id,name,ip FROM device WHERE ip = '$busqueda_ip' ";
} 

$result = pg_query($link,$query) or die(pg_last_error());
$row = pg_fetch_assoc($result);

if($row["device_id"]!="") {
	echo "<ul>";
	
	do {
		$server_id=$row["server_id"];
		$event_id=$row["event_id"];
		$map_id=$row["map_id"];
		$device_id=$row["device_id"];
		$ip=$row["ip"];
		$device=$row["name"];
		$begin_time=$row["begin_time"];
		$status=$row["status"];
		
	
			echo "<li><a href=\"device.php?device_id=$device_id&map_id=$map_id&server_id=$server_id\" class=\"arrow\">$device  <small>$ip</small></a></li>";	
	
	} while ($row = pg_fetch_array($result));
	
	echo "</ul>";

} else {
	?>
	<ul class="individual">
		<li><? echo NO_RESULTS; ?></li>
	</ul>
	
	<?
}

?>

	






<? print_footer(); ?>


</body>
</html>