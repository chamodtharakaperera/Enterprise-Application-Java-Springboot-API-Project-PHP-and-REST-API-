<?php
ob_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
	<h1><center>Customer Maintenance Requests</center></h1>
	<hr>
	
<form action="see.php">
	<hr>
	<table class="table table-striped">
	<tr>
		<th>Service ID</th>;
		<th>Date Of Service</th>;
		<th>Problem Description</th>;
		<th>Product ID</th>;
		<th>Purchase ID</th>;
		<th>Customer ID</th>;
		<th>Status</th>;
	</tr>
<?php  
include("dbconnect.php");
$query="SELECT * FROM product_service";
$query_run=mysqli_query($db_connect,$query);
while($row=mysqli_fetch_array($query_run))
{
	$servid=$row['serviceid'];
	$doserv=$row['doservice'];
	$prodes=$row['prob_desc'];
	$proid=$row['product_id'];
	$purchaseid=$row['purchase_id'];
	$cusid=$row['cusid'];
	$stat=$row['status'];
	?>
	

	<tr>
		<td><?php echo "$servid" ?></td>
		<td><?php echo "$doserv" ?></td>
		<td><?php echo "$prodes" ?></td>
		<td><?php echo "$proid" ?></td>
		<td><?php echo "$purchaseid" ?></td>
		<td><?php echo "$cusid" ?></td>
		<td><?php echo "$stat" ?></td>
		<?php
		echo "<td><a href='see.php?approve=$servid'>Approve</a></td>";
		echo "<td><a href='see.php?unapprove=$servid'>Unapprove</a></td>";
		echo "<td><a href='see.php?delete=$servid'>Delete</a></td>";
		?>
	</tr>
<?php
}
?>
	<?php  
	if(isset($_GET['approve'])) {
		$the_serv_id = $_GET['approve'];
		$query = "UPDATE product_service SET status='approve' where serviceid=$the_serv_id";
		$unapprove_status_query = mysqli_query($db_connect,$query);
		header("Location:see.php");
	}



	if(isset($_GET['unapprove'])) {
		$the_serv_id = $_GET['unapprove'];
		$query = "UPDATE product_service SET status='unapprove' where serviceid=$the_serv_id";
		$unapprove_status_query = mysqli_query($db_connect,$query);
		header("Location:see.php");
		ob_enf_fluch();
	}

	if(isset($_GET['delete'])) {
		$the_serv_id = $_GET['delete'];
		$query = "DELETE FROM product_service  where serviceid=$the_serv_id";
		$unapprove_status_query = mysqli_query($db_connect,$query);
		header("Location:see.php");
		ob_enf_fluch();
	}
	?>
</table>
</form>
</body>
</html>