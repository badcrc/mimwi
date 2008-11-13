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
	<title>Intermapper Mobile</title>
	<link rel="stylesheet" href="estilos/iphone.css" />
</head>

<body id="kitindex">
	<br />
	<div id="iphonedevlogo">
		<center>
		<img src="images/InterMapper.png" alt="intermapper" />
		
		
		<h1>MIMWI</h1>
		</center>
	</div>
	
	<ul class="data">
		<li><p><? echo ANNOUNCEMENT; ?></p></li>
	</ul>
		
	<ul >
		<li class="arrow"><a href="maps.php"><img src="images/mapas.png" class="ico" /><? echo MAPS; ?></a></li>
		<li class="arrow"><a href="alerts.php"><img src="images/list-icon-2.png" class="ico" /><? echo ALERTS; ?><small class="counter"><? echo get_actual_alerts($link);?></small></a></li>
		<li class="arrow"><a href="events.php"><img src="images/eventos.png" class="ico" /><? echo EVENTS; ?></a></li>
		<li class="arrow"><a href="search.php"><img src="images/list-icon-1.png" class="ico" /><? echo SEARCH; ?></a></li>
		
	</ul>
	
	<ul>
		<li class="arrow"><a href="about.php"><img src="images/list-icon-5.png" class="ico" /><? echo ABOUT; ?>...</a>	</li>
	</ul>
	

	

<? print_footer_index(); ?>


	
	
</body>
</html>