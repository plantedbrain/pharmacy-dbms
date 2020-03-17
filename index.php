<?php
include_once 'connect_db.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':
$result=mysqli_query($con ,"SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['username']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Pharmacist':
$result=mysqli_query($con,"SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['pharmacist_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;

case 'Manager':
$result=mysqli_query($con,"SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['manager_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}
?>
<!DOCTYPE html>
<html>
<head>
  <style>
  .p {
  background-color: white;
  color: black;
  border: 2px solid #008CBA;
}

.p:hover {
  background-color: #008CBA;
  color: white;
}
  </style>
<title>The Health Hut</title>
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">

</head>
<body bgcolor='white'>

<h1> <center>The Health Hut</h1>



     <center>
	 <img src="images/lpgo1.jpg" width="30%" height="29%">
      <h1>Login </h1>
      <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		<p><select name="position" >

			<option>Admin</option>
			<option>Pharmacist</option>

			<option>Manager</option>
			</select></p>
        <p  class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>

	<center><bgcolor='red'>The Health Hut 2019. Copyright All Rights Reserved to Aravind & Harshvardhan Rao

</body>
</html>
