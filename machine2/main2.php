<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register Product</h2>
                        <form method="POST" class="register-form" id="register-form" action="#">
                            <div class="form-group">
                                <!--<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>-->
                                <input type="text" name="proName" id="proName" placeholder="Product Name" required/>
                            </div>
                            <div class="form-group">
                                <!--<label for="email"><i class="zmdi zmdi-email"></i></label>-->
                                <input type="number" name="uPrice" id="uPrice" placeholder="Unit Price" min="0" required/>
                            </div>
                            <div class="form-group">
                                <!--<label for="pass"><i class="zmdi zmdi-lock"></i></label>-->
                                <input type="number" name="qtyhand" id="qtyhand" placeholder="Quantity in Hand" min="0" required/>
                            </div>
                            <!--<div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div> -->
                            <!--<div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>-->
                            <div class="form-group form-button">
                                <input type="submit" name="btn_save" id="btn_save" class="form-submit" value="Save"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/Register.png" alt="Register image" width="175" height="125"></figure>
						<figure><img src="images/Register2.gif" alt="Register image" width="350" height="250"></figure>
                        <!--<a href="#" class="signup-image-link">I am already member</a>-->
                    </div>
                </div>
            </div>
        </section>
		
						
<?php
if(isset($_POST["btn_save"]))
{
	
	$pname = $_POST["proName"];
	$price = $_POST["uPrice"];
	$qty = $_POST["qtyhand"];

	$con = mysqli_connect("localhost:3303","root","");
	mysqli_select_db($con,"capitalholdings");

	$sql = "INSERT INTO Product(product_name, unit_price, qty_in_hand) VALUES('$pname', $price, $qty)";

	mysqli_query($con, $sql);

	mysqli_close($con);

	echo '<script type="text/javascript">
		alert("Product registered successfully");
		</script> ';
		
}

?>


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/edit.png" alt="Edit image" width="125"></figure>
						<figure><img src="images/update.png" alt="Update image" width="175" height="125"></figure>
                        <!--<a href="#" class="signup-image-link">Create an account</a>-->
                    </div>
					
					
                    <div class="signin-form">
                        <h2 class="form-title">Edit Products</h2>
						
                        <form method="POST" class="register-form" id="login-form" action="#">
                            <div class="form-group">
                                <!--<label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>-->
                                <input type="text" name="SearchproName" id="SearchproName" placeholder="Product Name" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="btn_search" id="btn_search" class="form-submit" value="Search"/>
                            </div>
                        </form>
                        
						
						<?php

						if(isset($_POST["btn_search"]))
						{
													
						$proname = $_POST["SearchproName"];
						$con = mysqli_connect("localhost:3303","root","");
						mysqli_select_db($con,"capitalholdings");

						$sql = "SELECT * FROM Product WHERE product_name='$proname' ";  
						$result = mysqli_query($con, $sql);

						$id = "";
						$pname = "";
						$qty = "";
						$uprice = "";

						while($row = mysqli_fetch_array($result))
						{

							$id = $row['Id'];
							$pname = $row['product_name'];
							$qty = $row['qty_in_hand'];
							$uprice =  $row['unit_price'];

						}

						mysqli_close($con);
						}

						echo '
						<script type="text/javascript">
						<body OnLoad="document.getElementById("uid").focus();">
						</script> ';


						?>
						
						<?php
						if(isset($_POST["btn_search"]))
						{
						echo '
						<form method="POST" class="register-form" id="register-form" action="#">
                            <div class="form-group">
                                <!--<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>-->
								<br/><br/>
								<input type="hidden" id = "uid" name="uid" value="'.$id.'" />
                                Product Name <input type="text" name="uproname" value="'.$pname.'" autofocus required/>
                            </div>
                            <div class="form-group">
                                <!--<label for="email"><i class="zmdi zmdi-email"></i></label>-->
                                Quantity in Hand <input type="number" name="uqty" value="'.$qty.'" min="0" required/>
                            </div>
                            <div class="form-group">
                                <!--<label for="pass"><i class="zmdi zmdi-lock"></i></label>-->
                                Unit Price <input type="number" name="uunitp" value="'.$uprice.'" min="0" required/>
                            </div>
                            <!--<div class="form-group">
                            </div>-->
                            <div class="form-group form-button">
                                <input type="submit" name="btnUpdate" id="btnUpdate" class="form-submit" value="Update"/>
								<input type="submit" name="btnDelete" id="btnDelete" class="form-submit" value="Delete"/>
                            </div>
                        </form>
						';
						}
						?>
						
                    </div>
                </div>
            </div>
        </section>

    </div>


<?php
if(isset($_POST["btnUpdate"]))
{
$pid = $_POST["uid"];
$pname = $_POST["uproname"];
$price = $_POST["uunitp"];
$qty = $_POST["uqty"];

$con = mysqli_connect("localhost:3303","root","");
mysqli_select_db($con,"capitalholdings");

$sql = "UPDATE Product set product_name='$pname', unit_price=$price, qty_in_hand=$qty WHERE Id=$pid ";

mysqli_query($con, $sql);

mysqli_close($con);

echo '<script type="text/javascript">
alert("Product data updated successfully");
</script> ';
}
?>

<?php
if(isset($_POST["btnDelete"]))
{
$pid = $_POST["uid"];

$con = mysqli_connect("localhost:3303","root","");
mysqli_select_db($con,"capitalholdings");

$sql = "DELETE FROM Product WHERE Id=$pid ";

mysqli_query($con, $sql);

mysqli_close($con);

echo '<script type="text/javascript">
alert("Product data deleted successfully");
</script> ';
}
?>

   <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>