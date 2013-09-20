<?php 
header('Content-type: text/html; charset=utf-8');

include('db_config.php');



$city_id = $_REQUEST['city_id'];

$sql = "SELECT c.* 
		FROM rm_city c
		WHERE c.id = ". $city_id;

$city = mysql_query($sql);

$city = mysql_fetch_array($city);

$city_info = array();

//$city_info['city_title'] = $city['title']; so it dont use
$city_info['city_lat'] = $city['lat'];
$city_info['city_lng'] = $city['lng'];
$city_info['city_zoom'] = $city['zoom'];

echo json_encode($city_info);

?>
