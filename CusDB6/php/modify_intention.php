<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>modify_intention</title>
</head>

<body>

<?php 
include_once './collect_mysql.php';
$con=collect_mysql();
	
$intentions = $_POST["message"]; //获得输入的数据
$pageid = $_POST["id"];
$add=$_REQUEST["add"];

mysqli_query($con,'set names utf8');

$sql = "UPDATE customer_info SET customer_intention='".$intentions."' WHERE id =".$pageid; 
if ($con->query($sql) === TRUE) { 
	echo "<script language=javascript>alert('Update customer intention record successfully!');</script>";
} else { 
    echo "Error: " . $sql . "<br>" . $con->error; 
	echo "<script language=javascript>alert('Error:". $sql . "<br>" . $con->error."');</script>";
} 

$con->close(); 
echo "<script>window.location.href='".$add."';</script>"; 
?>

</body>
</html>