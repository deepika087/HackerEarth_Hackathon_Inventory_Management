
<?php
$mysqli = new mysqli("localhost", "root", "", "inventorymanagement");

$sql = "CREATE TABLE items_channels
	(
	itemId integer, 
	channel_name VARCHAR (50) not null,
	channel_date DATETIME , 
	channel_quantity integer , 
	channel_specific_cost integer
	)";

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Create table doesn't return a resultset */
if ($mysqli->query($sql) === TRUE) {
    printf("Table items_channels successfully created.\n");
} else { 
	printf("Error: %s\n", $mysqli->error); 
}

?>