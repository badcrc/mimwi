<?
session_start();

require_once "db.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : <? echo EVENTS; ?></title>
	<link  rel="stylesheet" href="estilos/iphone.css" />
	
</head>

<body>

<?
$event_id=sql_quote($_GET["event_id"]);
$server_id=sql_quote($_GET["server_id"]);

if($event_id!="") {

	$query="SELECT event_id,server_id,map_id,device_id,begin_time,end_time,status,probe,reason FROM event WHERE event_id='$event_id' AND server_id='$server_id'";
	
	$result = pg_query($link,$query) or die(pg_last_error());
	$row = pg_fetch_assoc($result);
	
	if($row["event_id"]!="") {	
			$event_id=$row["event_id"];
			$server=get_server_name($link,$row["server_id"]);
			$map=get_map_name($link,$row["map_id"]);
			$device=get_device_name($link,$row["map_id"],$row["device_id"]);
			$begin_time=$row["begin_time"];
			$end_time=$row["end_time"];
			$status=$row["status"];
			$probe=$row["probe"];
			$reason=$row["reason"];
	}
}


?>
	
	<div id="header">
		<h1><? echo EVENTS; ?></h1>
		<a href="events.php" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>



<h1><? echo DATA; ?></h1>

<ul class="field">
	<li><h3><? echo DEVICE; ?>:</h3><a href="device.php?device_id=<? echo $row['device_id']; ?>&map_id=<? echo $row['map_id']; ?>&server_id=<? echo $row['server_id']; ?>"><? echo $device; ?></a></li>
	<li><h3><? echo MAP; ?>:</h3><? echo $map; ?> </li>
	<li><h3><? echo CREATE_TIME; ?>:</h3><? echo $begin_time; ?></li>
	<li><h3><? echo DELETE_TIME; ?>:</h3><? echo $end_time; ?></li>
	<li><h3><? echo STATUS; ?>:</h3><? echo $status; ?></li>


</ul>

<h1><? echo REASON; ?></h1>

<ul class="data">
	<li>
		<p>
		<? 
			if($reason!="")
				echo $reason;
			else
			 	echo "N/A";
		?>
		</p>
	</li>
</ul>





<? print_footer(); ?>




</body>
</html>
