<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>modify_information</title>
</head>

<body>
<?php
include_once './collect_mysql.php';
$con=collect_mysql();
	
$pageid = $_POST["id"];  //获得输入id
$add=$_REQUEST["add"];
mysqli_query($con,'set names utf8');
$sql = "UPDATE customer_info SET 
		username='".$_POST["username"]."',
		range1='".$_POST["range1"]."',
		gender='".$_POST["gender"]."',
		nation='".$_POST["nation"]."',
		native='".$_POST["native"]."',
		degree='".$_POST["degree"]."',
		company='".$_POST["company"]."',
		birth_date='".$_POST["birth_date"]."',
		birth_date1='".$_POST["birth_date1"]."',
		tel='".$_POST["tel"]."',
		qq_num='".$_POST["qq_num"]."',
		email='".$_POST["email"]."',
		trait='".$_POST["trait"]."',
		hobby='".$_POST["hobby"]."',
		taboo='".$_POST["taboo"]."',
		physical='".$_POST["physical"]."',
		address='".$_POST["address"]."',
		family='".$_POST["family"]."',
		visit='".$_POST["visit"]."',
		other='".$_POST["other"]."'
			WHERE id ='".$pageid."'"; 
/*		 


*/
$result = $con->query($sql);
if ($con->query($sql) === TRUE) { 
	echo "<script language=javascript>alert('Update customer informations record successfully!');</script>";
} else { 
    echo "Error: " . $sql . "<br>" . $con->error; 
	echo "<script language=javascript>alert('Error:". $sql . "<br>" . $con->error."');</script>";
} 

$con->close();
echo "<script>window.location.href='".$add."';</script>"; 
?>

</body>
</html>