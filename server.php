<?
session_start();

require_once "db.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : Servidor</title>
	<link rel="stylesheet" href="estilos/iphone.css" />
	
</head>

<body>

<?
$server_id=sql_quote($_GET["server_id"]);


	$query="SELECT * FROM server WHERE server_id=$server_id";
	
	$result = pg_query($link,$query) or die(pg_last_error());
	$row = pg_fetch_assoc($result);
	
	if($row["server_id"]!="") {	
			$server=get_server_name($link,$row["server_id"]); if($server=="") $server="N/A";
			$uuid=$row["uuid"]; if($uuid=="") $uuid="N/A";
			$url=$row["url"]; if($url=="") $url="N/A";
			$host_location=$row["host_location"]; if($host_location=="") $host_location="N/A";
			$host_contact=$row["host_contact"]; if($host_contact=="") $host_contact="N/A";
			$network_name=$row["network_name"]; if($network_name=="") $network_name="N/A";
			$poll_type=$row["poll_type"]; if($server=="") $server="N/A";
			$device_interval=$row["device_interval"]; if($device_interval=="") $device_interval="N/A";
			$event_interval=$row["event_interval"]; if($event_interval=="") $event_interval="N/A";
			$data_interval=$row["data_interval"]; if($data_interval=="") $data_interval="N/A";
			$import_profile=$row["import_profile"]; if($import_profile=="") $import_profile="N/A";
			$create_time=$row["create_time"]; if($create_time=="") $create_time="N/A";
			$delete_time=$row["delete_time"]; if($delete_time=="") $delete_time="N/A";

	}


?>
	
	<div id="header">
		<h1><? echo SERVER?></h1>
		<a href="maps.php" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>



<h1><? echo SERVER?> #<? echo $server_id;?></h1>

<ul class="field">
	<li><h3><? echo NAME?>:</h3><? echo $server; ?></li>
	<li><h3>UUID:</h3><? echo $uuid; ?></li>
	<li><h3>URL:</h3><a href="<? echo $url; ?>"><? echo $url; ?></a></li>
	<li><h3><? echo LOCATION?>:</h3><? echo $host_location; ?></li>
	<li><h3><? echo CONTACT?>:</h3><? echo $host_contact; ?></li>
	<li><h3><? echo NET?>:</h3><? echo $network_name; ?></li>
	<li><h3><? echo POLL?>:</h3><? echo $poll_type; ?></li>
	<li><h3><? echo DEVICE_INTERVAL?>:</h3><? echo $device_interval; ?></li>
	<li><h3><? echo EVENT_INTERVAL?>:</h3><? echo $event_interval; ?></li>
	<li><h3><? echo DATA_INTERVAL?>:</h3><? echo $data_interval; ?></li>
	<li><h3><? echo CREATE_TIME?>:</h3><? echo $create_time; ?></li>
	<li><h3><? echo DELETE_TIME?>:</h3><? echo $delete_time; ?></li>



</ul>





<? print_footer(); ?>



</body>
</html>