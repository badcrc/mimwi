<?
session_start();

//change jppraph path to a working one
require_once "db.php";
require_once "/Users/koldo/Proyectos/PHP/jpgraph-2.3.3/src/jpgraph.php";
require_once "/Users/koldo/Proyectos/PHP/jpgraph-2.3.3/src/jpgraph_line.php";

	
	$data=$_SESSION["data_value"];
	$label=$_SESSION["label"];
	
	
	//dependiendo del tipo de grafica ponemos colores distintos
	if(strstr($label,"Response")) {
		$color_linea="#FFAE00";
		$color_fondo="#FFDD94";
	} else if(strstr($label,"Outgoing")){
		$color_linea="#00FF00";
		$color_fondo="#A5FAA5";
	} else if(strstr($label,"Incoming")){
		$color_linea="#0000FF";
		$color_fondo="#4AC6FF";
	} else if(strstr($label,"CPU")){
		$color_linea="#FFCC00";
		$color_fondo="#FFFF00";
	} else if(strstr($label,"Free Memory")){
		$color_linea="#6600FF";
		$color_fondo="#AE00FF";
	} else if(strstr($label,"packet loss")){
		$color_linea="#940000";
		$color_fondo="#FF4B4B";
	} else {
		$color_linea="#000000";
		$color_fondo="#CCCCCC";
	}


	$graph = new Graph(500,250,"auto"); 
	$graph->img->SetMargin(50, 5, 30, 30);     
	$graph->SetMarginColor('#D4D4D4');
	$graph->SetScale('textlin'); 
	$line1 = new LinePlot($data); 
	$line1->SetColor($color_linea);
	$line1->SetWeight(2);
	$line1->SetFillColor($color_fondo);
	$line1->SetFillGradient($color_linea,$color_fondo);
	
	$graph->title->Set($label);
	$graph->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->Add($line1); 
	$graph->Stroke();


?>