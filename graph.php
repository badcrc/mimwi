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
	<title>MIMWI : <? echo GRAPHS; ?></title>
	<link rel="stylesheet" href="estilos/iphone.css" />
</head>

<body id="images">

<?
$device_id=sql_quote($_GET["device_id"]);
$map_id=sql_quote($_GET["map_id"]);
$server_id=sql_quote($_GET["server_id"]);
$dataset_id=sql_quote($_GET["dataset_id"]);




?>
	
	<div id="header">
		<h1><? echo GRAPH; ?></h1>
		<a href="device.php?device_id=<? echo $device_id; ?>&map_id=<? echo $map_id; ?>&server_id=<? echo $server_id; ?>" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>
	

<?
if($dataset_id!="") {

	
	$query="SELECT dataset_id, data_time,data_value FROM datapoint WHERE dataset_id='$dataset_id' ORDER BY data_time DESC LIMIT 50";
	
	$result = pg_query($link,$query) or die(pg_last_error());
	$row = pg_fetch_assoc($result);
	
}

	if($row["dataset_id"]!="") {	
		$i=0;	
		echo "<ul class=\"individual\">";
		do {
			$data_time[$i]=$row["data_time"];
			$data_value[$i]=$row["data_value"];
			$i+=1;
			
		} while ($row = pg_fetch_array($result));
		echo "<li>";
		
		$_SESSION["data_value"]=$data_value;
		$_SESSION["data_time"]=$data_time;
		$_SESSION["label"]=get_dataset_name($link,$dataset_id); if($_SESSION["label"]=="") $_SESSION["label"]="N/A";

		echo "<a href='#'style=\"background: url(do_graph.php) no-repeat\"></a>\n";
		
		echo "</li>";
		echo "</ul>";
		
	} else {
	?>
	<ul class="individual">
		<li>No hay datos para dibujar la gráfica</li>
	</ul>
	
	<?
	}
?>






</body>
</html>