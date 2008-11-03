<?

require_once "db.php";
require_once "funciones.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : <? echo SEARCH; ?></title>
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
<body>

	<div id="header">
		<h1><? echo SEARCH; ?></h1>
			<a href="index.php" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>
	

	<h3><? echo NAME_SEARCH; ?></h3>
	<ul class="form">
			<form action="busca.php" name="busca_equipo" method="post">
			<li><input type="text" name="equipo" value="<? echo DEVICE; ?>" id="some_name" onclick="clickclear(this, '<? echo DEVICE; ?>')" onblur="clickrecall(this,'<? echo DEVICE; ?>')" /></li>
		</ul>
	<p><a href="javascript:document.busca_equipo.submit()" class="button white"><? echo SEARCH; ?></a></p>
	</form>
	
	
	<h3><? echo IP_SEARCH; ?></h3>
	
	<ul class="form">
			<form action="busca.php" name="busca_ip" method="post">
			<li><input type="text" name="ip" value="X.X.X.X" id="some_name" onclick="clickclear(this, 'X.X.X.X')" onblur="clickrecall(this,'X.X.X.X')" /></li>
	
	</ul>
	<p><a href="javascript:document.busca_ip.submit()" class="button white"><? echo SEARCH; ?></a></p>
	</form>


	
	
	
	
	

<? print_footer(); ?>


</body>
</html>