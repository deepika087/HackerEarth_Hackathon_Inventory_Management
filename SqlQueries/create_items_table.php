
<?php
$mysqli = new mysqli("localhost", "root", "", "inventorymanagement");

$sql = "CREATE TABLE items
	(
	id integer Primary key AUTO_INCREMENT ,
	name VARCHAR (50) not null,
	description varchar(50) , 
	lower_threshold integer  ,
	upper_threshold integer , 
	storage_place varchar(30) ,
	category varchar(30) ,
	subcategory varchar(30),
	image blob,
	cost integer not null,
	totalQunatity integer 
	)";

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Create table doesn't return a resultset */
if ($mysqli->query($sql) === TRUE) {
    printf("Table items successfully created.\n");
} else { 
	printf("Error: %s\n", $mysqli->error); 
}
?>