<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>add_data</title>
</head>

<body>

<?php 
include_once './collect_mysql.php';
$con=collect_mysql();
	
$name=$_REQUEST["name"];
$add=$_REQUEST["add"];

mysqli_query($con,'set names utf8');

$sql = "insert into customer_info (username)values('".$name."')"; 
if ($con->query($sql) === TRUE) { 
	echo "<script language=javascript>alert('请点击添加的客户名字进入详情页面修改其他信息！');</script>";
} else { 
    echo "Error: " . $sql . "<br>" . $con->error; 
	echo "<script language=javascript>alert('Error:". $sql . "<br>" . $con->error."');</script>";
}
$con->close(); 
echo "<script>window.location.href='/index.php';</script>"; 
?>

</body>
</html>