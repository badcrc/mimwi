<?
 error_reporting(0);

require_once "functions.php"; 


//change this to point to you server data
 
$dbhost="";
$dbport="";
$dbname="";
$dbuser="";
$dbpasswd="";

$lang="en";

if(file_exists("lang_$lang.php"))
	require_once("lang_$lang.php");
else 
	require_once("lang_en.php");

$link=pg_connect("host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpasswd");

if(!$link) {
	?>
		<center>
		<? echo ERROR_DB_CONNECT; ?>
		</center>	
	<?
	die();
}




?>
