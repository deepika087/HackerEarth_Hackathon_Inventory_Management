<html>
<body bgcolor="#091256">
<?php
$con=mysql_connect("localhost","root","") or die("COULDNT CONNECT ");
mysql_select_db("question",$con) or die("COULDNT CONNECT WITH DATABASE");
$sql="delete from questionlist";
if(!mysql_query($sql,$con))
{die('could not connect:' .mysql_error());}

echo "<h2>ALL records deleted succesfully</h2>";
mysql_close();
?>
</html>
</body>