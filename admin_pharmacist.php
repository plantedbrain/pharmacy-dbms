<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['staff_id'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_POST['username'];
$pas=$_POST['password'];
$sql1=mysqli_query($con,"SELECT * FROM pharmacist WHERE username='$user'")or die(mysqli_error());
 $result=mysqli_fetch_array($sql1);
if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysqli_query($con,"INSERT INTO pharmacist(first_name,last_name,staff_id,postal_address,phone,email,username,password)
VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_pharmacist.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $username;?> <center> The Health Hut</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />

<script src="js/function.js" type="text/javascript"></script>
<script>
function validateForm()
{

var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for(i=0;i<str.length;i++)
	{
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.first_name.value="";
	document.form1.first_name.focus();
	return false;
	}}

if(document.form1.first_name.value=="")
{
alert("Name Field is Empty");
return false;
}

var str=document.form1.last_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for(i=0;i<str.length;i++)
	{
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Last Name Cannot Contain Numerical Values");
	document.form1.last_name.value="";
	document.form1.last_name.focus();
	return false;
	}}


if(document.form1.last_name.value=="")
{
alert("Name Field is Empty");
return false;
}

}

</script>
<style>
 #main {height: 450px;}
 #left_column {
 float: left;
 width: 200px;
 height: 470px;
 }
 #footer{

 background: red;

 }
 #header h1{
   text-shadow: 2px 2px black;
 color:#333;
 }
 #header {

 background: red;
 border-bottom: ;
 }
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/lpgo1.jpg"></a> <center>The Health Hut</h1></div>
<div id="left_column" style="background-color:#E8E8E8">
<div id="button" style="margin-top:50%">
		<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_pharmacist.php">Pharmacist</a></li>
			<li><a href="admin_manager.php">Manager</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">
    <h4>Manage Pharmacist</h4>
<hr/>
    <div class="tabbed_area">

        <ul class="tabs">
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View User</a></li>
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add User</a></li>

        </ul>

        <div id="content_1" class="content">
		<?php echo $message;
			  echo $message1;
        include_once('connect_db.php');
       $result = mysqli_query($con,"SELECT * FROM pharmacist")or die(mysql_error());
        echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>ID</th><th>Firstname </th> <th>Lastname </th> <th>Username </th><th>Delete</th></tr>";
        while($row = mysqli_fetch_array( $result )) {
                echo "<tr>";
                echo '<td>' . $row['pharmacist_id'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				?>
				<td><a href="delete_pharmacist.php?pharmacist_id=<?php echo $row['pharmacist_id']?>"><center><img src="images/delete.jpg" width="35" height="35" border="0" /></a></td>
				<?php
		 }
        echo "</table>";
?>
        </div>
        <div id="content_2" class="content">
				   <?php echo $message;
			  echo $message1;
			  ?>
		<center><form name="form1" onsubmit="return validateForm(this);" action="admin_pharmacist.php" method="post" >
			<table width="220" height="106" border="0" cellpadding="2">
				<tr><td align="center"><input name="first_name" type="text" style="width:170px" placeholder="First Name" required="required" id="first_name" /></td></tr>
				<tr><td align="center"><input name="last_name" type="text" style="width:170px" placeholder="Last Name" required="required" id="last_name" /></td></tr>
				<tr><td align="center"><input name="staff_id" type="text" style="width:170px" placeholder="Staff ID" required="required" id="staff_id"/></td></tr>
				<tr><td align="center"><input name="postal_address" type="text" style="width:170px" placeholder="Address" required="required" id="postal_address" /></td></tr>
				<tr><td align="center"><input name="phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="phone" /></td></tr>
				<tr><td align="center"><input name="email" type="email" style="width:170px" placeholder="Email" required="required" id="email" /></td></tr>
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
      <tr><td align="center"><input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr>
        <tr><td align="center"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
        </div>
    </div>
</div>
</div>
<div id="footer" align="Center">The Health Hut 2019. Copyright All Rights Reserved to Aravind & Harshvardhan rao</div>
</div>
</body>
</html>
