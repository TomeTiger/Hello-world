<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php
 function collect_mysql()
 {
	$servername="localhost";
	$username="sfydb_6267143";
	$password="Seaam200002D";
	$dbname = "sfydb_6267143";

	$con = new mysqli($servername, $username, $password,$dbname); 
	if ($con->connect_error) { 
		die("Connection failed: " . $con->connect_error); 
		echo "对不齐，我没连接上了";
	}
	return $con;
 }
 ?>
</body>
</html>