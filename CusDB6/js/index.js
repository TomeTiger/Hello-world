// JavaScript Document
function hideIntention(id) {
    var obj = document.getElementById(id);
    obj.style.display = "none";
}

function showIntention(id, id1, id2) {
    var obj  = document.getElementById(id);
	var obj1  = document.getElementById(id1);
	var obj2  = document.getElementById(id2);
	obj.style.display = "block";
	obj1.style.display = "none";
	obj2.style.display = "none";
/*
    var winWidth = document.documentElement.clientWidth;
    var winHeight = document.documentElement.clientHeight;
    var offsetTop = document.documentElement.offsetTop;
*/
/*
    var left = (winWidth - width)/2;
    var top  = (winHeight - height)/2 + offsetTop;
    obj.style.top = top + "px";
    obj.style.left = left + "px";
*/
    
}

function add_data()
{
	var name=prompt("请输入客户的名字","南宫铁柱");
	if (name!=null && name!="")
	{
		alert("你好，添加客户" + name + "成功！请到客户信息详情里面添加其他信息！");
		window.location = "./php/add_data.php?name="+name;
		}
	else{
		alert("你好，请输入客户名字哦！");
	}
}
function delete_data(id, name)
{	var in_name=prompt("请输入您要删除的客户的名字！");
	if(in_name==name)
	{
		window.location = "./php/delete_data.php?id= "+id+"&name="+name;
		//alert("你已经成功删除"+name+"的所有信息");
	}
	else{
		alert("啊玛丽，我的饰盖不够哈曼妮");
		alert("in_name="+in_name+"; name="+name+name+id);
	}
}
