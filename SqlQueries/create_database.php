<?php
$con=mysql_connect("localhost","root","");
if(mysql_query("create database InventoryManagement ",$con))
{
echo "DATABSE CREATED  ";
}
else
{
echo "TRY AGAIN ";
}

mysql_close();

?>