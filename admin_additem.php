<?php

include("connection.php");

// save the session variable in another variable
$sess_aid = $_SESSION["ad_id"];

// finding the specific member record based on the session variable
$result = mysql_query("select * from admin where AdminID = $sess_aid");
$row=mysql_fetch_assoc($result);

if(!isset($_SESSION["ad_id"]))
{
 header("location:homepage.php");
}
if(isset($_POST["btnadd"]))
{

}
?>
<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" type="text/css" href="css.css"/>
<style>
.register_form
{
border-style:solid;
border-width:1px;
border-radius:5px;
background-color:#b3e0ff;
background-position:center;
width:300px;
height:380px;
margin-left:300px;
padding-left:40px;

}
td
{
font-size:20px;
}



.leftprofile
{
border:#66c2ff 1px solid;
height:840px;
width:280px;
background:#000f1a;

}

.title
{
background-color:#000f1a;
font-size:25px;
color:#66c2ff;
padding:10px;
font-family:arial narrow;
border-bottom:#66c2ff solid 1px;

}
.profile_detail table
{
margin-left:30px;
}

.profile_detail
{
background-color:#E6E6E6;
border:solid 2px ;
margin-left:300px;
margin-right:10px;
margin-top:10px;
height:700px;
}

.profile_detail input[type="password"], .profile_detail input[type="text"], .profile_detail input[type="email"], .profile_detail input[type="number"],select, .profile_detail textarea
{
	border-style:solid;
	border-width:2px;
	border-color:#383838;
	border-radius:4px;
	padding-left:40px;
	margin: 10px 5px;
	height:27px;
	width:180px;
}

.profile_detail input[type='submit']
{
	background-position:1px;
	background-color:#66c2ff;
	color:#000f1a;
	border-width:1.5px;
	border-color:#004c80;
	border-radius:3px;
	font-family:arial narrow;
	width:120px;
	font-size:18px;
	margin-left:10px;
	margin-top:110px;
}

.profile_detail input[type='submit']:hover
{
	font-family:arial narrow;
	background-color:#ccebff;
	color:#002ecd;
	border-color:#001f33;
}

</style>
<script type="text/javascript">
function validate() {
	if (document.Addfrm.Name.value == "") {
		alert ("Please enter the product name");
		document.Addfrm.Name.focus();
		return false;
	}
	if ((document.Addfrm.number.value =="") || isNaN(document.Addfrm.number.value)) {
		alert ("Please enter the product quantity");
		document.Addfrm.number.focus();
		return false;
	}
	if ((document.Addfrm.price.value == "") || isNaN(document.Addfrm.price.value)) {
		alert("Please enter the price of the product");
		document.Addfrm.price.focus();
		return false;
	}
	if (document.Addfrm.Description.value == "") {
		alert("Please descript the product in the description box")
		document.Addfrm.Description.focus();
		return false;
	}
}
</script>
</head>
<body>
<div style="border:black 2px solid;height:1122px;width:1020px;margin-left:200px;background-color:#e5f5ff">
<br/>
<br/>
<span style="color:#262626;font-size:55px;font-weight:bold;font-family:arial narrow;padding-left:100px;"><span style="font-style:italic;">P</span>harma<span style="color:#005c99">c</span>y </span><span style="color:#262626;font-size:45px;font-weight:bold;font-family:arial narrow;">Online</span>
<br/>
<span style="color:#262626;font-size:25px;font-weight:bold;font-family:arial narrow;padding-left:100px;font-style:oblique;">| The most efficient pharmacy is within your own system</span>
<br/>
<br/>
<br/>
<div style=";background-color:black; 	height:1px;"></div>
<div style=";background-color:#004c80;height:40px;font-weight:bold;color:#ffffff;font-size:15px;"><br/>Admin UserName:<?php echo $row["AdminUsername"]; ?><span style="float:right;">Date:<?php date_default_timezone_set("Asia/Kuala_Lumpur");echo date("d-m-Y H:i:s");?></span></div>
<div style=";background-color:black; height:1px;"></div>


<ul class="profile">

<div class="leftprofile">
<li><a href="admin_homepage.php"><span style="clear:both;">Profile</span></a></li>

<li><a href="admin_editprofile.php"><span style="clear:both;">Edit Profile</span></a>
</li>
<li><a href="admin_additem.php"><span style="clear:both;">Add Item</span></a></li>
<li><a href="admin_edititem.php"><span style="clear:both;">Edit Item</span></a></li>
<li><a href="admin_deleteitem.php"><span style="clear:both;">Delete Item</span></a></li>
<li><a href="admin_viewitem.php"><span style="clear:both;">View Item</span></a></li>
<li><a href="admin_viewitemsale.php"><span style="clear:both;">View Item sale</span></a></li>
<li><a href="logout.php"><span style="clear:both;">Log Out</span></a></li>

</div>

</ul>

<div class="profile_detail">
<div class="title">
Add Item
</div>
<form method="POST" name="AddFrm" enctype="multipart/form-data" action="admin_upload.php">
<table>
<tr>
<td><span style="font-weight:bold;">Product Picture</span></td>
<td>:</td>
<td><input type="file" name="file" /></td>
</tr>
<tr>
<td><span style="font-weight:bold;">Code Of Medicine</span></td>
<td>:</td>
<td><input type="text" name="code_of_medicine" placeholder="Code of Medicine"/></td>
</tr>
<tr>
<td><span style="font-weight:bold;">Name</span></td>
<td>:</td>
<td> <input type="text" name="Name" placeholder="Product Name"/></td>
</tr>
<tr>
<td><span style="font-weight:bold;">Quantity</span></td>
<td>:</td>
<td> <input type="number" name="number" placeholder="Number"/></td>
</tr>
<tr>
<td><span style="font-weight:bold;">Price</span></td>
<td>:</td>
<td> <input type="text" name="price" placeholder="price"/></td>
</tr>
<tr>
<td><span style="font-weight:bold;">Description</span></td>
<td>:</td>
<td><textarea name="Description" placeholder="Description"/></textarea><td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" name="btnadd" value="add" onclick="return validate();"/><input type="submit" name="btncancel" value="Cancel"/></td>
</tr>
</table>
</form>
</div>

<div style=";background-color:black;height:1px;margin-top:140px;"></div>
<div style=";background-color:#004c80;height:62px"><br/></div>
</div>

</body>
</html>
