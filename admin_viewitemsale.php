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
	width:150px;
}

.profile_detail input[type='button']
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
}

.profile_detail input[type='button']:hover
{
	font-family:arial narrow;
	background-color:#ccebff;
	color:#002ecd;
	border-color:#001f33;
}

table
{
font-family:arial narrow;
font-size:17px;
margin-left:40px;
margin-right:5px;
margin-top:40px;
margin-bottom:50px;
border-collapse:collapse;
text-align:center;
}

table th
{
background:#262626;
color:#66c2ff;
padding:5px;
}

table td
{
padding:5px;
background:#e5f5ff;
}
</style>
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

<li><a href="admin_editprofile.php"><span style="clear:both;">Edit Profile</span></a></li>
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
View Item Sale
</div>
<form name="slaesfrm" method="post">
<span style="font-weight:bold;">Search By  </span>:
<select name="searchday">
<option value="Daily">Daily</option>
<option value="Month">Month</option>
<option value="soldItem">Most frequent sold item of the month</option>
</select>
<input type="submit" name="btnsearch" value="Search"/>
<br/>
<?php
if(isset($_POST["btnsearch"]))
{
  if($_POST["searchday"] == "Daily")
  {
    date_default_timezone_set("Asia/Kuala_Lumpur")
    ?>

    <input type="date" name="dailydate"/>
    <input type="submit" name="btndaily" value="Search"/>
 <?php
  }
if(isset($_POST["btndaily"]))
{
  $sday = $_POST["dailydate"];
  $answer = mysql_query("select * from sales where SalesDate like '$sday%'");
  $row1 = mysql_fetch_assoc($answer);
  if(mysql_fetch_row($answer) > 0)
  {
    $query = mysql_query("select SUM(SalesQuantity) as q from sales");
    $count = mysql_fetch_assoc($query);
  ?>
    Today sales is <?php echo $count['q']; ?>.
  <?php
  }
  else {
    ?>
      <script>
        alert("<?php echo $sday; ?>");
      </script>
    <?php
  }
}
  if($_POST["searchday"] == "Month")
  {
    $answer2 = mysql_query("SELECT `StaffID` AS Staff, SUM(`SalesQuantity`) AS MONTHNAME(`SalesDate`) FROM `sales`");

    $row2 = mysql_fetch_assoc($answer2);
    while(mysql_fetch_row($row2))
    {
      echo $row2;
    }
  }
}
 ?>
</form>
</div>

<div style=";background-color:black;height:1px;margin-top:140px;"></div>
<div style=";background-color:#004c80;height:62px"><br/></div>
</div>

</body>
</html>
