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
#left_column{
height: 497px;
}
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
<h1><a href="#"><img src="images/hd_logo.jpg"></a> Pharmacy Sys</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_pharmacist.php">Pharmacist</a></li>
			<li><a href="admin_manager.php">Manager</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<h4 style="color:sienna; margin-left: 200px; font-size:20px;">You have successfully added and entity into the database</h4>

            <div class="grid_7">
            	
                <a href="admin_pharmacist.php" class="dashboard-module">
                	<img src="images/pharmacist_icon.jpg"  width="75" height="75" alt="edit" />
                	<span>Manage Pharmacist</span>
                </a>
                
                <a href="admin_manager.php" class="dashboard-module">
                	<img src="images/manager_icon.png"  width="75" height="75" alt="edit" />
                	<span>Manage Manager</span>
                </a>
                  
                <a href="admin_cashier.php" class="dashboard-module">
                	<img src="images/cashier_icon.jpg" width="75" height="75" alt="edit" />
                	<span>Manage Cashier</span>
                </a>				  
                             
            </div>

 </div>
<div id="footer" align="Center"> The Health Hut 2019. Copyright Reserved to Aravind and Harshvardhan</div>
</div>
</body>
</html>
