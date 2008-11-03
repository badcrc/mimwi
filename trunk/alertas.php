<?

require_once "db.php";
require_once "funciones.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>IM Mobile : <? echo ALERTS ?></title>
	<link rel="stylesheet" href="estilos/iphone.css" />
</head>

<body id="metal">
	
	<div id="header">
		<h1><? echo ALERTS ?></h1>
		<a href="index.php" id="backButton" class="nav"><? echo BACK ?></a>
	</div>



<?

$query="SELECT event_id,map_id,device_id,begin_time,status FROM event WHERE status != 'okay' AND end_time='infinity' ORDER BY begin_time DESC";

$result = pg_query($link,$query) or die(pg_last_error());
$row = pg_fetch_assoc($result);

if($row["event_id"]!="") {
	echo "<ul>";
	
	do {
		$event_id=$row["event_id"];
		$map_id=$row["map_id"];
		$device=get_device_name($link,$map_id,$row["device_id"]);
		$begin_time=$row["begin_time"];
		$status=$row["status"];
	
		switch($status) {
			case "okay": $img_status="images/okay.png"; break;
			case "down": $img_status="images/down.png"; break;
			case "alarm": $img_status="images/alarm.png"; break;
			case "critical": $img_status="images/critical.png"; break;
			case "warning": $img_status="images/warning.png"; break;	
		}	
			echo "<li><a href=\"alerta.php?id=$event_id\" class=\"arrow\">$device <small><img src=\"$img_status\" alt=\"$status\" ></small><em>$begin_time</em></a></li>";	
	
	} while ($row = pg_fetch_array($result));
	
	echo "</ul>";

} else {
	?>
	<ul class="individual">
		<li>No hay eventos</li>
	</ul>
	
	<?
}

?>

	

<? print_footer(); ?>

</body>
</html>