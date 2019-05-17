<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>delete_data</title>
</head>

<body>

<?php 
include_once './collect_mysql.php';
$con=collect_mysql();
	
$id=$_REQUEST["id"];
$name=$_REQUEST["name"];
//echo "我收到了你的消息".$id.$name;
mysqli_query($con,'set names utf8');

$sql = "DELETE FROM customer_info WHERE id=".$id; 
if ($con->query($sql) === TRUE) { 
	echo "<script language=javascript>alert('Delete  ".$name." successfully!');</script>";
} else { 
    echo "Error: " . $sql . "<br>" . $con->error; 
	echo "<script language=javascript>alert('Error:". $sql . "<br>" . $con->error."');</script>";
}

$con->close(); 
echo "<script>window.location.href='/index.php';</script>"; 
?>

</body>
</html>