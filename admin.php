<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - The Health Hut</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>
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
<div id="left_column"style="background-color:#E8E8E8">
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

 <!-- Dashboard icons -->
            <div class="grid_7">

                <a href="admin_pharmacist.php" class="dashboard-module">
                	<img src="images/pharma.png"  width="75" height="75" alt="edit" />
                	<span>Pharmacist</span>
                </a>

                <a href="admin_manager.php" class="dashboard-module">
                	<img src="images/manager.jpg"  width="75" height="75" alt="edit" />
                	<span>Manager</span>
                </a>

			</div>
</div>

<div id="footer" align="Center">The Health Hut 2019. Copyright All Rights Reserved Aravind & Harshvardhan Rao</div>

</div>
</body>
</html>
	9
