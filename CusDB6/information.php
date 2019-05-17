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

<?php
echo "<div id='section1'>";
include_once './php/collect_mysql.php';
$con=collect_mysql();

mysqli_query($con,'set names utf8');
$sql = "SELECT * FROM customer_info where id='".$_GET['arr']."'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

echo "<img id='profile' src='./images/profile.jpg' alt='profile_picture'>";
echo "<h2>客户意向</h2>";
echo "<p>".$row['customer_intention']."</p>";

echo "<div class='buttons'>";
echo "<button class='button button1' onclick=\"showIntention('layer_intention','layer_relation','layer_information')\"><a class='anchor' href='#goto'>修改</a></button>";
echo "</div>";
echo "<h2>主要关系</h2>";
echo "<table id='customer_rela' class='customer_info'>";
for($i=1;$i<=5;$i++)  //查找关系客户
{
	$relations = "relation".$i;
	$sql1 = "SELECT username FROM customer_info where id='".$row[$relations]."'";
	$result1 = $con->query($sql1);

	if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {
		${$r.$i} = $row1["username"]."_".$row["relation".$i];
		echo "<tr>";
		echo   "<td>".$i.":</td>";
		echo   "<td><a href='./information.php?arr=".$row["relation".$i]."'>".$row1["username"]."</a></td>";
		echo "</tr>";
		}
	}else{
		echo "没有";
	}
}
echo "</table>";
echo "<div class='buttons'>";
echo	"<button class='button button1' onclick=\"showIntention('layer_relation','layer_intention','layer_information')\"><a class='anchor' href='#goto'>修改</a></button>";
echo "</div>";
echo "</div>";
/* -------------------------------------------------------------------------------------- */
echo "<div id='section2'>";
echo "<h2>客户资料</h2>";
echo "<table id='customer_info_id' class='customer_info'>";
echo  "<tr>";
echo    "<td>姓名：</td>";
echo    "<td>".$row['username']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>档位：</td>";
echo    "<td>".$row['range1']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>性别：</td>";
echo    "<td>".$row['gender']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>民族：</td>";
echo    "<td>".$row['nation']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>籍贯：</td>";
echo    "<td>".$row['native']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>学历：</td>";
echo    "<td>".$row['degree']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>公司/职位：</td>";
echo    "<td>".$row['company']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>出生国历：</td>";
echo    "<td>".$row['birth_date']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>出生阴历：</td>";
echo    "<td>".$row['birth_date1']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>电话：</td>";
echo    "<td>".$row['tel']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>QQ：</td>";
echo    "<td>".$row['qq_num']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>邮箱：</td>";
echo    "<td>".$row['email']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>性格特点：</td>";
echo    "<td>".$row['trait']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>业余爱好：</td>";
echo    "<td>".$row['hobby']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>其他忌讳：</td>";
echo    "<td>".$row['taboo']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>身体情况：</td>";
echo    "<td>".$row['physical']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>家庭地址：</td>";
echo    "<td>".$row['address']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>家庭情况：</td>";
echo    "<td>".$row['family']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>拜访记录：</td>";
echo    "<td>".$row['visit']."</td>";
echo  "</tr>";
echo  "<tr>";
echo    "<td>其他补充：</td>";
echo    "<td>".$row['other']."</td>";
echo  "</tr>";
echo "</table>";
echo "<div class='buttons'>";
echo	"<button class='button button1' onclick=\"showIntention('layer_information','layer_intention','layer_relation')\"><a class='anchor' href='#goto'>修改</a></button>";
echo "</div>";
echo "</div>";

/* -------------------------------------------------------------------------------------- */

echo "<div id='layer_intention' class='layer'>";
echo	"<form class='inner_layer' action='./php/modify_intention.php?add=".$_SERVER["REQUEST_URI"]."' method='post'>";
echo		"<div class='title'>";
echo			"<h2>修改客户意向</h2>";
echo		"</div>";
echo        "<p><textarea name='message' rows='8' class='textarea-inherit' >".$row['customer_intention']."</textarea></p>";
echo 		"<p><input name='id' style='display:none' readonly size='0' value=".$_GET['arr']."></p>";  //传递主页面客户的id
echo        "<p><input class='button' type='submit' value='确认修改' /></p>";
echo	"</form>";
echo    "<button class='button' onclick=\"hideIntention('layer_intention')\">关闭表单</button>";
echo "</div>";
/* --------------- */
echo "<div id='layer_relation' class='layer'>";
echo	"<form class='inner_layer' autocomplete = 'off' action='./php/modify_relation.php?add=".$_SERVER["REQUEST_URI"]."'  method='post'>";
echo		"<div class='title'>";
echo			"<h2>修改客户关系</h2>";
echo		"</div>";
//获取客户信息数据中的用户名，放到表单中用于选择
			$sql1 = "SELECT id,username FROM customer_info";
			$result1 = $con->query($sql1);
			if ($result1->num_rows > 0) { 
				for($j=1;$j<=5;$j++){
					echo "<p><label>".$j.": </label><input list='list_customer' name='c".$j."' value='".${$r.$j}."'></p>";
				}
					echo "<datalist id='list_customer'>";
						while($row1 = $result1->fetch_assoc()) {
        					echo "<option value='".$row1['username']."_".$row1['id']."'>";
						}
        			echo "</datalist>"; 
			} else { 
			    echo "Error: " . $sql . "<br>" . $con->error; 
			} 
			
echo 	"<p><input name='id' style='display:none' readonly size='0' value=".$_GET['arr']."></p>";  //传递主页面客户的id
echo	"<p><input class='button' type='submit' value='确认提交' /></p>";
echo	"</form>";
echo    "<button class='button' onclick=\"hideIntention('layer_relation')\">关闭表单</button>";
echo "</div>";
/* ---- */
echo "<div id='layer_information' class='layer'>";
echo	"<form class='inner_layer' action='./php/modify_information.php?add=".$_SERVER["REQUEST_URI"]."' method='post'>";
echo		"<div class='title'>";
echo			"<h2>修改客户信息</h2>";
echo		"</div>";
echo    "<div class='monster'>";
echo    "<p><label>姓名: </label><input value='".$row['username']."' type='input' name='username' /></p>";
echo    "<p><label>档位: </label><input value='".$row['range1']."' type='input' name='range1' /></p>";
echo    "<p><label>性别: </label><input value='".$row['gender']."' type='input' name='gender' /></p>";
echo    "<p><label>民族: </label><input value='".$row['nation']."' type='input' name='nation' /></p>";
echo    "<p><label>籍贯: </label><input value='".$row['native']."' type='input' name='native' /></p>";
echo    "<p><label>学历: </label><input value='".$row['degree']."' type='input' name='degree' /></p>";
echo    "<p><label>公司/职位: </label><input value='".$row['company']."' type='input' name='company' /></p>";
echo    "<p><label>出生国历: </label><input value='".$row['birth_date']."' type='date' name='birth_date' /></p>";
echo    "<p><label>出生阴历: </label><input value='".$row['birth_date1']."' type='input' name='birth_date1' /></p>";
echo    "<p><label>电话: </label><input value='".$row['tel']."' type='tel' name='tel' /></p>";
echo    "</div>";
echo    "<div class='monster'>";
echo    "<p><label>QQ: </label><input value='".$row['qq_num']."' type='number' name='qq_num' /></p>";
echo    "<p><label>邮箱: </label><input value='".$row['email']."' type='email' name='email' /></p>";
echo    "<p><label>性格特点: </label><input value='".$row['trait']."' type='input' name='trait' /></p>";
echo    "<p><label>业余爱好: </label><input value='".$row['hobby']."' type='input' name='hobby' /></p>";
echo    "<p><label>其他忌讳: </label><input value='".$row['taboo']."' type='input' name='taboo' /></p>";
echo    "<p><label>身体情况: </label><input value='".$row['physical']."' type='input' name='physical' /></p>";
echo    "<p><label>家庭地址: </label><input value='".$row['address']."' type='input' name='address' /></p>";
echo    "<p><label>家庭情况: </label><input value='".$row['family']."' type='input' name='family' /></p>";
echo    "<p><label>拜访记录: </label><input value='".$row['visit']."' type='input' name='visit' /></p>";
echo    "<p><label>其他补充: </label><input value='".$row['other']."' type='input' name='other' /></p>";
echo    "</div>";
echo    "<p><input name='id' style='display:none' readonly size='0' value=".$_GET['arr']."></p>";
echo	"<p><input class='button' type='submit' value='确认提交' /></p>";
echo "</form>";
echo "<button class='button button3' onclick=\"hideIntention('layer_information')\">关闭表单</button>";
echo "</div>";
    }
} else {
    echo "0 results";
}
$con->close();
?>
<! -------------------------------------------------------------------------------------->
<div id="footer">
	<p>版权所有 Copyright @ 2019 Joy.WisdomConsulting YiZhang</p>
</div>
<! -------------------------------------------------------------------------------------->
<a name="goto"></a>
</body>
</html>
