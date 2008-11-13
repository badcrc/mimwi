<?
session_start();

require_once "db.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : <? echo INTERFACES; ?></title>
	<link rel="stylesheet" href="estilos/iphone.css" />
	
</head>

<body>

<?
$device_id=sql_quote($_GET["device_id"]);
$map_id=sql_quote($_GET["map_id"]);
$server_id=sql_quote($_GET["server_id"]);

if($device_id!="") {

	$query="SELECT * FROM interface WHERE device_id='$device_id' AND map_id='$map_id' AND server_id='$server_id' ORDER BY interface_id ASC";
	
	$result = pg_query($link,$query) or die(pg_last_error());
	$row = pg_fetch_assoc($result);
	
}


?>
	
	<div id="header">
		<h1><? echo INTERFACES; ?></h1>
		<a href="dispositivo.php?device_id=<? echo $device_id; ?>&map_id=<? echo $map_id; ?>&server_id=<? echo $server_id; ?>" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>
	

<?
if($row["interface_id"]!="") {		
	do {
		$server=get_server_name($link,$row["server_id"]); if($server=="") $server="N/A";
		$map=get_map_name($link,$row["map_id"]); if($map=="") $map="N/A";
		$device=get_device_name($link,$row["map_id"],$row["device_id"]); if($device=="") $device="N/A";
		$interface_id=$row["interface_id"]; if($interface_id=="") $interface_id="N/A";
		$name=$row["name"]; if($name=="") $name="N/A";
		$ifindex=$row["ifindex"]; if($ifindex=="") $ifindex="N/A";
		$ifdescr=$row["ifdescr"]; if($ifdescr=="") $ifdescr="N/A";
		$ifname=$row["ifname"]; if($ifname=="") $ifname="N/A";
		$ifalias=$row["ifalias"]; if($ifalias=="") $ifalias="N/A";
		$iftype=get_ifacetype_name($link,$row["iftype_id"]); if($iftype=="") $iftype="N/A";
		$ifmtu=$row["ifmtu"]; if($ifmtu=="") $ifmtu="N/A";
		$iflastchange=$row["iflastchange"]; if($iflastchange=="") $iflastchange="N/A";
		$dot3duplex=$row["dot3duplex"]; if($dot3duplex=="") $dot3duplex="N/A";
		//$retentionpolicy=get_retention_name($link,$row["retentionpolicy_id"]); if($retentionpolicy=="") $retentionpolicy="N/A";
		$txspeed=$row["txspeed"]; if($txspeed=="") $txspeed="N/A";
		$rxspeed=$row["rxspeed"]; if($rxspeed=="") $rxspeed="N/A";
		$mac=$row["mac"]; if($mac=="") $mac="N/A";
		$status=$row["status"]; if($status=="") $status="N/A";
		$enabled=$row["enabled"]; if($enabled=="") $enabled="N/A";
		//$pvid=$row["pvid"]; if($pvid=="") $pvid="N/A";
		$vlans=$row["vlans"]; if($vlans=="") $vlans="N/A";
		//$alarmpt=$row["alarmpt"]; if($alarmpt=="") $alarmpt="N/A";
		//$customer_name_reference=$row["customer_name_reference"]; if($customer_name_reference=="") $customer_name_reference="N/A";
		$create_time=$row["create_time"]; if($create_time=="") $create_time="N/A";
		$delete_time=$row["delete_time"]; if($delete_time=="") $delete_time="N/A";
		
		
		switch($enabled) {
			case "t": $enabled="Si"; break;
			case "f": $enabled="No"; break;
		}
		?>
		<h1>Interface <? echo $interface_id?></h1

		<ul class="field">
			<li><h3><? echo DEVICE; ?>:</h3><? echo $device; ?></li>
			<li><h3><? echo NAME; ?>:</h3><? echo $name; ?></li>
			<li><h3><? echo IF_NAME; ?>:</h3><? echo $ifname; ?></li>
			<li><h3><? echo IF_DESC; ?>:</h3><? echo $ifdescr; ?></li>
			<li><h3><? echo DUPLEX; ?>:</h3><? echo $dot3duplex; ?></li>
			<li><h3><? echo TX_SPEED; ?>:</h3><? echo $txspeed; ?></li>
			<li><h3><? echo RX_SPEED; ?>:</h3><? echo $rxspeed; ?></li>
			<li><h3><? echo MAC; ?>:</h3><? echo $mac; ?></li>
			<li><h3><? echo VLAN; ?>:</h3><? echo $vlans; ?></li>
			<li><h3><? echo STATUS; ?>:</h3><? echo $status; ?></li>
			<li><h3><? echo ENABLED; ?>:</h3><? echo $enabled; ?></li>
			<li><h3><? echo ALIAS; ?>:</h3><? echo $ifalias; ?></li>
			<li><h3><? echo IF_TYPE; ?>:</h3><? echo $iftype; ?></li>
			<li><h3><? echo MTU; ?>:</h3><? echo $ifmtu; ?></li>
			<li><h3><? echo LAST_CHANGE; ?>:</h3><? echo $iflastchange; ?></li>
			<li><h3><? echo CREATE_TIME; ?>:</h3><? echo $create_time; ?></li>
			<li><h3><? echo DELETE_TIME; ?>:</h3><? echo $delete_time; ?></li>




		</ul>
		<?
		
		
		
	} while ($row = pg_fetch_array($result));
} else {
	?>
	<ul class="individual">
		<li>No hay interfaces para este dispositivo</li>
	</ul>
	
	<?
}
?>





<? print_footer(); ?>



</body>
</html>