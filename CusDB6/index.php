<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link rel="Shortcut Icon" href="./images/logo.ico" />
<link rel="stylesheet" href="./css/style.css" type="text/css" media="all">

</head>

<body bgcolor="#94C2E3">
<script type="text/javascript" src="./js/index.js"></script>
<! -------------------------------------------------------------------------------------->
<div>
	<div id="logo">
	<img src="./images/joy_logo.jpg" width="100" height="100" alt="profile_picture">
	</div>
<! -------------------------------------------------------------------------------------->
	<div id="header">
	<h1>Customer Info&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
	</div>
</div>
<! -------------------------------------------------------------------------------------->
<div id="nav">
<a href="./index.php" id="home">Home</a><br>
<a href="javascript:void(0);" onclick="add_data()">AddData</a><br>
<a href="#">filter</a><br>
<h4>友情链接</h4>
<a href="http://www.thinkl.com.cn/" target="_blank">智珑</a><br>
<a href="http://www.joyzhiyuan.com/" target="_blank">加一</a><br>
<a href="http://www.tobacco.gov.cn/html/" target="_blank">烟草</a><br>
<a href="http://www.chinapost.com.cn/" target="_blank">邮政</a><br>
</div>
<! -------------------------------------------------------------------------------------->
<div id="section3">
<?php
include_once './php/collect_mysql.php';
$con=collect_mysql();
mysqli_query($con,'set names utf8');
$sql0 = "SELECT count(id) as num FROM customer_info"; //查找总共有多少行,计算最大页数
$result0 = $con->query($sql0);
$page_num=1;	//默认第1页
$page_size=20;	//设置页面显示观测数
if ($result0->num_rows > 0) {
    $row0 = $result0->fetch_assoc();
	$cus_num = $row0['num'];
	$page_total = ceil($cus_num/$page_size);
} else {
    echo "0 results";
}

// --------------------
function show_list($page_num=1,$page_size=10){  //显示数据的函数
$start_num = ($page_num-1)*$page_size;
$sql = "SELECT id,username,range1,gender,company FROM customer_info ORDER BY customer_info.id DESC limit ".$start_num.",".$page_size." ";
global $con;
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
			echo  "<tr>";
			echo    "<td>".$row['id']."</td>";
			echo    "<td><a href='./information.php?arr=".$row["id"]."'>".$row['username']."</a></td>";
			echo    "<td>".$row['range1']."</td>";
			echo    "<td>".$row['gender']."</td>";
			echo    "<td>".$row['company']."</td>";
			echo	"<td><button class=\"button button1\" onclick=\"delete_data('".$row['id']."','".$row['username']."')\">删除</button></td>";
			echo  "</tr>";
    }
} else {
    echo "0 results";
}
echo  "</table>";
} // --------------------函数结束

echo "<h2>客户列表</h2>";	
echo "<table id='customer_info_id1' class='customer_info'>";
echo  "<tr>";
echo    "<th>ID</th>";
echo    "<th>姓名</th>";
echo    "<th>档位</th>";
echo    "<th>性别</th>";
echo    "<th>公司</th>";
echo  "</tr>";

$page_num = $_GET['page'];
if($page_num<1){
	$page_num = 1;
}else if($page_num>$page_total){
	$page_num = $page_total;
}
show_list($page_num,$page_size);

$last = $page_num-1;
$next = $page_num+1;
if($page_num==1){
	$last = 1;
}
if($page_num==$page_total){
	$next = $page_num;
}
echo	"<input class='button' type='button' onclick=\"window.location.href='index.php?page=1'\" value='首页'>";
echo	"<input class='button' type='button' onclick=\"window.location.href='index.php?page=".$last."'\" value='上一页'>";
echo	"<input class='button' type='button' onclick=\"window.location.href='index.php?page=".$next."'\" value='下一页'>";
echo	"<input class='button' type='button' onclick=\"window.location.href='index.php?page=".$page_total."'\" value='尾页'>";
$con->close();

?>


</div>
<! -------------------------------------------------------------------------------------->

<! -------------------------------------------------------------------------------------->
<div id="footer">
版权所有 Copyright @ 2019 Joy.WisdomConsulting YiZhang
</div>
<! -------------------------------------------------------------------------------------->
</body>
</html>
