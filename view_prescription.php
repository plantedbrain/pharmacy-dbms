<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $user?> The Healthn hut</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" />
<script src="js/function1.js" type="text/javascript"></script>
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
<h1><a href="#"><img src="images/lpgo1.jpg"></a><center>The Health Hut</h1></div>
<div id="left_column"style="background-color:#E8E8E8">
<div id="button" style="margin-top:50%">
		<ul>
			<li><a href="manager.php">Dashboard</a></li>
			<li><a href="view_prescription.php">View Prescriptions</a></li>
			<li><a href="stock.php">Manage Stock</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">
    <h4>View Prescription</h4>
<hr/>
    <div class="tabbed_area">

        <ul class="tabs">
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active"> Prescription </a></li>

        </ul>


        <div id="content_1" class="content">
		<?php echo $message1;
        include_once('connect_db.php');
       $result = mysqli_query($con,"SELECT * FROM prescription")or die(mysqli_error());
        echo "<table border='1' cellpadding='5' border='2'>";
        echo "<tr> <th>Customer</th><th>Prescription Number</th><th>Age </th><th>Sex </th>><th>Phone </th><th>Date </th><th>Delete</th></tr>";
        while($row = mysqli_fetch_array( $result )) {
                echo "<tr>";
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['prescription_id'] . '</td>';
                echo '<td>' . $row['age'] . '</td>';
                echo '<td>' . $row['sex'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
				      	echo '<td>' . $row['date'] . '</td>';
				?>
        <td><a href="delete_prescription.php?prescription_id=<?php echo $row['prescription_id']?>">
        <img src="images/delete.jpg" width="35" height="35" border="0" ></a></td>

				<?php

    }
        echo "</table>";
?>
        </div>

    </div>
</div>
</div>
<div id="footer" align="Center"> The Health Hut	 2019. Copyright All Rights Reserved Aravind & Harshvardhan Rao</div>
</div>
</body>
</html>
