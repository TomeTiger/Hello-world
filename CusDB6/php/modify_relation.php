<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>modify_relation</title>
</head>

<body>
<?php
include_once './collect_mysql.php';
$con=collect_mysql();
	
$pageid = $_POST["id"];  //获得输入数据
$add=$_REQUEST["add"];
$relation1 = substr($_POST["c1"],strpos($_POST["c1"],"_")+1);
$relation2 = substr($_POST["c2"],strpos($_POST["c2"],"_")+1);
$relation3 = substr($_POST["c3"],strpos($_POST["c3"],"_")+1);
$relation4 = substr($_POST["c4"],strpos($_POST["c4"],"_")+1);
$relation5 = substr($_POST["c5"],strpos($_POST["c5"],"_")+1);
mysqli_query($con,'set names utf8');

$sql = "UPDATE customer_info SET 
		relation1='".$relation1."',
		relation2='".$relation2."',
		relation3='".$relation3."',
		relation4='".$relation4."',
		relation5='".$relation5."'
		 WHERE id ='".$pageid."'"; 
if ($con->query($sql) === TRUE) { 
	echo "<script language=javascript>alert('Update customer relations record successfully!');</script>";
} else { 
    echo "Error: " . $sql . "<br>" . $con->error; 
	echo "<script language=javascript>alert('Error:". $sql . "<br>" . $con->error."');</script>";
} 

$con->close(); 
echo "<script>window.location.href='".$add."';</script>"; 
?>

</body>
</html>