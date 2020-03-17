<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
$sname=$_POST['drug_name'];
$cat=$_POST['category'];
$des=$_POST['description'];
$com=$_POST['company'];
$sup=$_POST['supplier'];
$qua=$_POST['quantity'];
$cost=$_POST['cost'];
$sta="Available";

$sql=mysqli_query($con,"INSERT INTO stock(drug_name,category,description,company,supplier,quantity,cost,status,date_supplied)
VALUES('$sname','$cat','$des','$com','$sup','$qua','$cost','$sta',NOW())");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> -The Health Hut</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>#left_column {
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
}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/lpgo1.jpg"></a><center>The Health Hut</h1></div>
<div id="left_column"style="background-color:#E8E8E8">
<div id="button" style="margin-top:50%">
<ul>
			<li><a href="manager.php">Dashboard</a></li>
			<li><a href="view_prescription.php">View Prescription</a></li>
			<li><a href="stock.php">Manage Stock</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">
    <h4>Manage Stock</h4>
<hr/>
    <div class="tabbed_area">

        <ul class="tabs">
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Stock</a></li>
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Medicine</a></li>

        </ul>

        <div id="content_1" class="content">
		 <?php echo $message;
			  echo $message1;
			  ?>

		<?php
		/*
		View
        Displays all data from 'Stock' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database

        $result = mysqli_query($con,"SELECT * FROM stock")
                or die(mysqli_error());
		// display data in table
        echo "<table border='1' cellpadding='3'>";
         echo "<tr><th>ID</th><th>Name</th><th>Category</th><th>Description</th><th>Status </th><th>Date </th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {

                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['stock_id'] . '</td>';
                echo '<td>' . $row['drug_name'] . '</td>';
				echo '<td>' . $row['category'] . '</td>';
				echo '<td>' . $row['description'] . '</td>';
				echo '<td>' . $row['status'] . '</td>';
				echo '<td>' . $row['date_supplied'] . '</td>';?>
				<td><a href="delete_stock.php?stock_id=<?php echo $row['stock_id']?>"><center><img src="images/delete.jpg" width="24" height="24" border="0" /></a></td>
				<?php
		 }
        // close table>
        echo "</table>";
?>
        </div>
        <div id="content_2" class="content">
         <!--Add Drug-->
		 <?php echo $message;
			  echo $message1;
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="stock.php" method="post" >
			<table width="420" height="106" border="0" >
				<tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Drug Name" required="required" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="category" type="text" style="width:170px" placeholder="Category" required="required" id="category"/></td></tr>
				<tr><td align="center"><input name="description" type="text" style="width:170px" placeholder="Description" required="required" id="description" /></td></tr>
				<tr><td><input name="status" type="radio" style="width:170px"   required="required" id="status" value="available" checked>Available
				<input name="status" type="radio" style="width:170px"   required="required" id="status" value="unavailable" checked>Unavailable</td></tr>
				<tr><td align="center"><input name="date" type="datetime-local" style="width:170px" placeholder="Date" required="required" id="date_supplied" /></td></tr>

				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>
        </div>

    </div>

</div>

</div>
<div id="footer" align="Center">The Health Hut 2019. Copyright All Rights Reserved Aravind & Harshvardhan Rao</div>
</div>
</body>
</html>
