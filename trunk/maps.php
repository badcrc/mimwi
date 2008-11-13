<?
session_start();
require_once "db.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : <? echo MAPS; ?></title>
	<link rel="stylesheet" href="estilos/iphone.css" />
	
	<script type="text/javascript">
	function clickclear(thisfield, defaulttext) {
	if (thisfield.value == defaulttext) {
	thisfield.value = "";
	}
	}
	function clickrecall(thisfield, defaulttext) {
	if (thisfield.value == "") {
	thisfield.value = defaulttext;
	}
	}
	</script>	
	
</head>

<?
$query="SELECT server_id,map_id,name FROM map WHERE enabled='t' order by server_id ASC";

$result = pg_query($link,$query) or die(pg_last_error());
$row = pg_fetch_assoc($result);
?>

<body id="normal">
	
	<div id="header">
		<h1><? echo MAPS; ?></h1>
		<a href="index.php" id="backButton" class="nav"><? echo BACK; ?></a>

	</div>

	

<?


if($row["map_id"]!="") {
	do {
		echo "<h4>".get_server_name($link,$row["server_id"])."</h4>";
		echo "<ul>";
		
		do {
			$server_id=$row["server_id"];
			$map_id=$row["map_id"];
			$map_name=$row["name"];
			
		
				echo "<li class=\"arrow\"><a href=\"map.php?id=$map_id&server_id=$server_id\">".$row['name']."<small class=\"counter\">".get_device_numer($link,$map_id,$server_id)."</small></a></li>\n";	
		
		} while ($row = pg_fetch_array($result));
		
		echo "</ul>";
	} while ($row = pg_fetch_array($result));
	

} else {
	?>
	<ul class="individual">
		<li>No hay mapas disponibles :(</li>
	</ul>
	
	<?
}

?>










<? print_footer(); ?>


</body>
</html>