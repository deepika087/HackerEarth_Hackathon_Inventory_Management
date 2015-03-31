<?php 
$mysqli = new mysqli('localhost', 'root', '', 'inventorymanagement');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

var_dump($_POST);

$sql = "Insert into items values (null, '$_POST[name]', '$_POST[description]', '$_POST[lowerThreshold]', 
'$_POST[upperThreshold]' , '$_POST[shelf]', '$_POST[category]', '$_POST[subCategory]', null, '$_POST[perUnitCost]', '$_POST[totalQuantity]' )";

/* execute prepared statement */
if ($mysqli->query($sql) === FALSE) 
{
	printf("Error: %s\n", $mysqli->error);

} else {
	$last_insert_key = $mysqli->insert_id;
	printf("Value of last inserted key : %s", $last_insert_key);
	//ChromePhp::log( $last_insert_key); 

	$startIndex = 1;
	printf("Value of channel name : %s, %s ", 'channelName'.strval($startIndex), $_POST['channelName'.strval($startIndex)]);
	//ChromePhp::log( $_POST['channelName' + $startIndex]); 	
	while(isset($_POST['channelName'.strval($startIndex)])) {
		printf("Processing for: %s ", $startIndex);
		
		$newChannelName = $_POST['channelName'.strval($startIndex)];
		$newChannelDate = $_POST['channelDate'.strval($startIndex)];
		//$newdate = STR_TO_DATE('$newChannelDate', '%m/%d/%y')
		$newChannelDate = DateTime::createFromFormat("m/d/Y", $_POST['channelDate'.strval($startIndex)]);
		$newChannelDate = $newChannelDate->format('y-m-d');

		$newChannelQuantity = $_POST['channelQuantity'.strval($startIndex)];
		$newChannelCost = $_POST['specialUnitCost'.strval($startIndex)];
		//ChromePhp::log($newChannelName );

		$sql2 = "Insert into items_channels values ('$last_insert_key', '$newChannelName', '$newChannelDate' , '$newChannelQuantity' , '$newChannelCost')";
		 
		if ($mysqli->query($sql2) === FALSE) {
			printf("Error: %s\n", $mysqli->error);	
			exit();
		} else {
			$startIndex = $startIndex + 1;
		}
	}
}
 ?>




