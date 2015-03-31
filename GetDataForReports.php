<?php 
$mysqli = new mysqli('localhost', 'root', '', 'inventorymanagement');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

class ItemChannelObject {

	public $uniqueId = "";
	public $channelName = "";
	public $channelDate = "";
	public $channelUnitCost = "";
	public $channelQuantity = "";
	public $cost = "";
	public $totalQuantity = "";
	public $itemName = "";
}

$sql = "Select * from items LEFT OUTER JOIN items_channels ON items.id = items_channels.itemId";
$result = $mysqli->query($sql);

$resultList = array(); //this will be converted to JSON

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$item = new ItemChannelObject();	
	$item->uniqueId = $row['itemId'];
	$item->channelName = $row['channel_name'];
	$item->channelDate = $row['channel_date'];
	$item->channelUnitCost = $row['channel_quantity'];
	$item->channelQuantity = $row['channel_specific_cost'];
	$item->cost = $row['cost'];
	$item->totalQuantity = $row['totalQunatity'];
	$item->itemName = $row['name'];

	array_push($resultList, $item);
}
	
$someJSON = json_encode($resultList);
echo $someJSON;
?>




