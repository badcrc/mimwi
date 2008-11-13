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
	<title>MIMWI : <? echo DEVICE; ?></title>
	<link rel="stylesheet" href="estilos/iphone.css" />
	
</head>

<body>

<?
$device_id=sql_quote($_GET["device_id"]);
$map_id=sql_quote($_GET["map_id"]);
$server_id=sql_quote($_GET["server_id"]);


if($device_id!="") {

	//$query="SELECT device_id,server_id, name, ip, ipresolve, port, mac, notes, dnsname, netbios, probe, probekind, probe_xml, devicekind_id, enterprise_id, retentionpolicy_id, latitude, longitude, snmpversion, sysobjectid, sysdescr, sysname, syslocation, syscontact, sysuptime, mfgname, modelname, serialnum, customer_name_reference, create_time, delete_time FROM device WHERE device_id='$device_id' AND map_id='$map_id'";
	$query="SELECT * FROM device WHERE device_id='$device_id' AND map_id='$map_id' AND server_id='$server_id'";
	
	
	$result = pg_query($link,$query) or die(pg_last_error());
	$row = pg_fetch_assoc($result);
	
	if($row["device_id"]!="") {		
		
			$server=get_server_name($link,$row["server_id"]); if($server=="") $server="N/A";
			$map=get_map_name($link,$row["map_id"]); if($map=="") $map="N/A";
			$device=$row["name"]; if($device=="") $device="N/A";
			$ip=$row["ip"]; if($ip=="") $ip="N/A";
			$ipresolve=$row["ipresolve"]; if($ipresolve=="") $ipresolve="N/A";
			$port=$row["port"]; if($port=="") $port="N/A";
			$mac=$row["mac"]; if($mac=="") $mac="N/A";
			$notes=$row["notes"]; if($notes=="") $notes="N/A";
			$dnsname=$row["dnsname"]; if($dnsname=="") $dnsname="N/A";
			$netbios=$row["netbios"]; if($netbios=="") $netbios="N/A";
			$probe=$row["probe"]; if($probe=="") $probe="N/A";
			$devicekind=get_devicekind_name($link,$row["devicekind_id"]); if($devicekind=="") $devicekind="N/A";
			$enterprise=get_enterprise_name($link,$row["enterprise_id"]); if($enterprise=="") $enterprise_id="N/A";
			//$retentionpolicy=get_retention_name($link,$row["retentionpolicy_id"]); if($retentionpolicy=="") $retentionpolicy="N/A";
			$latitude=$row["latitude"]; if($latitude=="") $latitude="N/A";
			$longitude=$row["longitude"]; if($longitude=="") $longitude="N/A";
			$snmpversion=$row["snmpversion"]; if($snmpversion=="") $snmpversion="N/A";
			//$sysobjectid=$row["sysobjectid"]; if($sysobjectid=="") $sysobjectid="N/A";
			$sysdescr=$row["sysdescr"]; if($sysdescr=="") $sysdescr="N/A";
			$sysname=$row["sysname"]; if($sysname=="") $sysname="N/A";
			$syslocation=$row["syslocation"]; if($syslocation=="") $syslocation="N/A";
			$syscontact=$row["syscontact"]; if($syscontact=="") $syscontact="N/A";
			$sysuptime=$row["sysuptime"]; if($sysuptime=="") $sysuptime="N/A";
			//$mfgname=$row["mfgname"]; if($mfgname=="") $mfgname="N/A";
			$modelname=$row["modelname"]; if($modelname=="") $modelname="N/A";
			$serialnum=$row["serialnum"]; if($serialnum=="") $serialnum="N/A";
			//$customer_name_reference=$row["customer_name_reference"]; if($customer_name_reference=="") $customer_name_reference="N/A";
			$create_time=$row["create_time"]; if($create_time=="") $create_time="N/A";
			$delete_time=$row["delete_time"]; if($delete_time=="") $delete_time="N/A";
			
			switch($enabled) {
				case "t": $enabled="Si"; break;
				case "f": $enabled="No"; break;
			}
			
						
	}
}


?>
	
	<div id="header">
		<h1><? echo DEVICE; ?></h1>
		<a href="map.php?id=<? echo $map_id?>&server_id=<? echo $server_id; ?>" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>
	


<h1><? echo $device; ?></h1>

<ul class="field">
	<li><h3><? echo MAP; ?>:</h3><? echo $map." ($server)"; ?> </li>
	<li><h3><? echo IP; ?>:</h3><? echo $ip; ?></li>
	<li><h3><? echo INTERFACES; ?>:</h3><a href="interfaces.php?device_id=<? echo $device_id; ?>&map_id=<? echo $map_id; ?>&server_id=<? echo $server_id; ?>"><? echo VIEW_INTERFACES; ?></a></li>
	<li><h3><? echo ENTERPRISE; ?>:</h3><? echo $enterprise; ?></li>	
	<li><h3><? echo PORT; ?>:</h3><? echo $port; ?></li>
	<li><h3><? echo MAC; ?>:</h3><? echo $mac; ?></li>
	<li><h3><? echo DNS_NAME; ?>:</h3><? echo $dnsname; ?></li>
	<li><h3><? echo NETBIOS; ?>:</h3><? echo $netbios; ?></li>
	<li><h3><? echo IPRESOLVE; ?>:</h3><? echo $ipresolve; ?></li>
	<li><h3><? echo PROBE; ?>:</h3><? echo $probe; ?></li>
	<li><h3><? echo DEVICE; ?>:</h3><? echo $devicekind; ?></li>
	<li><h3><? echo LATITUDE; ?>:</h3><? echo $latitude; ?></li>
	<li><h3><? echo LONGITUDE; ?>:</h3><? echo $longitude; ?></li>
	<li><h3><? echo SNMP_VER; ?>:</h3><? echo $snmpversion; ?></li>
	<li><h3><? echo SYSDESCR; ?>:</h3><? echo $sysdescr; ?></li>
	<li><h3><? echo SYSNAME; ?>:</h3><? echo $sysname; ?></li>
	<li><h3><? echo SYSLOCATION; ?>:</h3><? echo $syslocation; ?></li>
	<li><h3><? echo SYSCONTACT; ?>:</h3><? echo $syscontact; ?></li>
	<li><h3><? echo SYSUPTIME; ?>:</h3><? echo $sysuptime; ?></li>
	<li><h3><? echo MODEL; ?>:</h3><? echo $modelname; ?></li>
	<li><h3><? echo SERIAL_NUMBER; ?>:</h3><? echo $serialnum; ?></li>
	<li><h3><? echo CREATE_TIME; ?>:</h3><? echo $create_time; ?></li>
	<li><h3><? echo DELETE_TIME; ?>:</h3><? echo $delete_time; ?></li>

	


</ul>

<h1><? echo NOTES; ?></h1>
<ul class="data">
	<li><p><? echo $notes;?></p></li>
</ul>

<h1><? echo GRAPHS; ?></h1
<ul class="field">
	<?
		$query="SELECT dataset_id,label FROM dataset WHERE device_id='$device_id' AND map_id='$map_id' AND server_id='$server_id' ORDER BY label ASC";
			
		$result = pg_query($link,$query) or die(pg_last_error());
		$row = pg_fetch_assoc($result);
	
		if($row["dataset_id"]!="") {	
			do {
				echo "<li class=\"arrow\"><a href=\"graph.php?dataset_id=".$row["dataset_id"]."&device_id=$device_id&map_id=$map_id&server_id=$server_id\">".$row["label"]."</a></li>";
			}while ($row = pg_fetch_array($result));
		} else {
			echo "<li>No hay gráficas para este dispositivo</li>";
		}
	
	?>
	
</ul>



<? print_footer(); ?>



</body>
</html>