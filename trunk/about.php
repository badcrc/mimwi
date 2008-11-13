<?
session_start();
require_once "db.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<title>MIMWI : Acerca de</title>
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
		<h1><? echo ABOUT; ?>...</h1>
		<a href="index.php" id="backButton" class="nav"><? echo BACK; ?></a>
	</div>

<h1>
MIMWI
</h1>


	<ul class="data">
		<li>
			<? echo ABOUT_TEXT; ?>
		</li>
	</ul>
	



<? print_footer(); ?>


</body>
</html>