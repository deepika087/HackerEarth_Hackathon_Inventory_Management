<?php 
$mysqli = new mysqli('sql202.cuccfree.com', 'cucch_16056211', 'dee087Pika', 'cucch_16056211_inventorymanagement');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}




/* execute prepared statement */


class ChannelObject {
	public $uniqueId = "";
	public $channelName = "";
	public $channelDate = "";
	public $channelQuantity = "";
	public $channelCost = "";
}

$sql = "Select * from items_channels ";
$result = $mysqli->query($sql);

$resultList = array(); //this will be converted to JSON

$last_insert_key = $mysqli->insert_id;

$startIndex = 1;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$item = new ChannelObject();	
	$item->uniqueId = $row['itemId'];
	$item->channelName = $row['channel_name'];
	/*
	$newChannelDate = DateTime::createFromFormat("Y/d/m H:i:s", $row['channel_date']);
	var_dump($newChannelDate);*/
	$item->channelDate	= $row['channel_date'];
	$item->channelQuantity = $row['channel_quantity'];
	$item->channelCost = $row['channel_specific_cost'];
	
	array_push($resultList, $item);
}
	
$someJSON = json_encode($resultList);
echo $someJSON;
?>




