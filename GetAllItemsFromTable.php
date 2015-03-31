<?php 
$mysqli = new mysqli('sql202.cuccfree.com', 'cucch_16056211', 'dee087Pika', 'cucch_16056211_inventorymanagement');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}




/* execute prepared statement */


class ItemObject {
	public $uniqueId = "";
	public $name = "";
	public $description = "";
	public $lowerThresh = "";
	public $upperThresh = "";
	public $shelf = "";
	public $category = "";
	public $subCategory = "";
	public $perUnitCost = "";
	public $quantity = "";
}

$sql = "Select * from items ";
$result = $mysqli->query($sql);

$resultList = array(); //this will be converted to JSON

$last_insert_key = $mysqli->insert_id;

$startIndex = 1;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$item = new ItemObject();	
	$item->uniqueId = $row['id'];
	$item->name = $row['name'];
	$item->description = $row['description'];
	$item->lowerThresh = $row['lower_threshold'];
	$item->upperThresh = $row['upper_threshold'];
	$item->category = $row['category'];
	$item->perUnitCost = $row['cost'];
	$item->quantity = $row['totalQunatity'];

	array_push($resultList, $item);
}
	
$someJSON = json_encode($resultList);
echo $someJSON;
?>




