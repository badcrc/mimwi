<?


function sql_quote( $value ){
    if( get_magic_quotes_gpc() ){
          $value = stripslashes( $value );
    }
	$value = addslashes( $value );
    return $value;
}

function print_footer() {
	?>
	<p>
		<? 
			$user_agent=$_SERVER["HTTP_USER_AGENT"];
			if(!strstr($user_agent,"iPhone")) { ?>
				<strong><? echo REAL_IPHONE; ?></strong><br />
			<?}

}


function print_footer_index() {
	?>
	<p>
		<? 
			$user_agent=$_SERVER["HTTP_USER_AGENT"];
			if(!strstr($user_agent,"iPhone")) { ?>
				<strong><? echo REAL_IPHONE; ?></strong><br />
			<?}
		?>
		
		This <a href="http://code.google.com/p/iphone-universal/">iPhone UI Framework kit</a> is licenced under GNU Affero General Public License (<a href="http://www.gnu.org/licenses/agpl.html">GNU AGPL 3</a>)<br />
		MIMWI is licenced under GNU General Public License (<a href="http://www.gnu.org/licenses/gpl-3.0.html">GPLv3</a>)


		</p>
	
	<?

}


function get_device_name($link,$map_id,$device_id) {
	$query="SELECT name FROM device WHERE device_id='$device_id' and map_id='$map_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["name"]!="") {
		$name=$row["name"];
	} else {
		$name="";
	}	
	return $name;
}

function get_device_numer($link,$map_id,$server_id) {
	$query="SELECT count(*)  FROM device WHERE map_id='$map_id' and server_id='$server_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["count"]!="") {
		$total=$row["count"];
	} else {
		$total="";
	}	
	return $total;
}

function get_actual_alerts($link) {
	
	$query="SELECT count(*)  FROM event WHERE status != 'okay' AND end_time='infinity'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["count"]!="") {
		$total=$row["count"];
	} else {
		$total="";
	}	
	return $total;
}

function get_map_name($link,$map_id) {
	$query="SELECT name FROM map WHERE map_id='$map_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["name"]!="") {
		$name=$row["name"];
	} else {
		$name="";
	}	
	return $name;
}

function get_server_name($link,$server_id) {
	$query="SELECT name FROM server WHERE server_id='$server_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["name"]!="") {
		$name=$row["name"];
	} else {
		$name="";
	}	
	return $name;
}

function get_enterprise_name($link,$enterprise_id) {
	$query="SELECT name FROM ianaenterprise WHERE enterprise_id='$enterprise_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["name"]!="") {
		$name=$row["name"];
	} else {
		$name="";
	}	
	return $name;
}

function get_retention_name($link,$retentionpolicy_id) {
	$query="SELECT name FROM retentionpolicy WHERE retentionpolicy_id='$retentionpolicy_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["name"]!="") {
		$name=$row["name"];
	} else {
		$name="";
	}	
	return $name;
}

function get_ifacetype_name($link,$iftype_id) {
	$query="SELECT name FROM ianaiftype WHERE iftype_id='$iftype_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["name"]!="") {
		$name=$row["name"];
	} else {
		$name="";
	}	
	return $name;
}

function get_devicekind_name($link,$devicekind_id) {
	$query="SELECT name FROM devicekind WHERE devicekind_id='$devicekind_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["name"]!="") {
		$name=$row["name"];
	} else {
		$name="";
	}	
	return $name;
}

function get_dataset_name($link,$dataset_id) {
	$query="SELECT label FROM dataset WHERE dataset_id='$dataset_id'";
	$result = pg_query($link,$query);
	$row = pg_fetch_array($result);
	if($row["label"]!="") {
		$name=$row["label"];
	} else {
		$name="";
	}	
	return $name;
}
?>