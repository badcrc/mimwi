<?

require_once "db.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : <? echo EVENTS; ?></title>
	<link rel="stylesheet" href="estilos/iphone.css" />
</head>

<body id="metal">
	
	<div id="header">
		<h1><? echo EVENTS; ?></h1>
		<a href="index.php" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>



<?


$total=sql_quote($_GET["total"]);
if($total=="") $total=0;
$doble=($total+15);

if($total==0) {
	$query="SELECT server_id,event_id,map_id,device_id,begin_time,status FROM event  ORDER BY begin_time DESC LIMIT 15";
}
else if($total!="") {
	$query="SELECT server_id,event_id,map_id,device_id,begin_time,status FROM event  ORDER BY begin_time DESC OFFSET $doble LIMIT $total";
}
else {
	$query="SELECT server_id,event_id,map_id,device_id,begin_time,status FROM event  ORDER BY begin_time DESC LIMIT 15";
}

$result = pg_query($link,$query) or die(pg_last_error());
$row = pg_fetch_assoc($result);

if($row["event_id"]!="") {
	echo "<ul>";
	
	do {
		$event_id=$row["event_id"];
		$map_id=$row["map_id"];
		$server_id=$row["server_id"];
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
		
	
			echo "<li><a href=\"event.php?event_id=$event_id&server_id=$server_id\" class=\"arrow\">$begin_time  <small><img src=\"$img_status\" alt=\"$status\" ></small> <em>$device</em></a></li>\n";	
	
	} while ($row = pg_fetch_array($result));
	
	echo "</ul>";

} else {
	?>
	<ul>
		<li>No hay eventos</li>
	</ul>
	
	<?
}

?>

	
<ul class="individual">
	<?
		$total_ant=$total+15;
		if($total!="") {
			$total_ant=$total+15;
			$total_sig=$total-15;
		}
		else  {
			$total_ant=$total+15;
			$total_sig="";
		}
			
	//	echo "<hr>$total_ant<hr>";
	?>
	<li><a href="eventos.php?total=<? echo $total_ant; ?>"><? echo PREVIOUS; ?></a></li>
	<li><a href="eventos.php?total=<? echo $total_sig; ?>"><? echo NEXT; ?></a></li>	
</ul>


<br /><br />


<? print_footer(); ?>


</body>
</html>