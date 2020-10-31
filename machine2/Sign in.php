<?php
if(isset($_POST["uname"]))
{	$uname=$_POST["uname"];
	$pass=$_POST["pass"];
	
	function verify($usrname,$paswrd)
	{
		
		  $curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost:8015/customer/verify?uname=".$usrname."&pass=".$paswrd."",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
		
		
	}
	
	
	echo verify($uname,$pass);

			if(verify($uname,$pass)==1)
			{
				session_start();
			$_SESSION["uname"]=$uname;
			$_SESSION["email"]=$pass;
			$_SESSION["logTime"]=time();
			 header("Location:index.php");
			}
			else 
			{

					echo"<script type='text/javascript'>
					alert('User name or password incorrect');
					window.location.replace('Sign in.php');
					</script>";



			}
 }
 ?>







<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign in</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="text/css" href="images/rgv.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign in/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign in/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign in/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign in/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Sign in/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign in/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign in/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Sign in/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign in/css/util.css">
	<link rel="stylesheet" type="text/css" href="Sign in/css/main.css">
	<link rel="stylesheet" href="rgvhotel/css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
<!--===============================================================================================-->
</head>
<body >
	
	<div class="limiter" >
		<div class="container-login100" style="background-image:url(Sign%20in/images/bg-01.jpg);">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form name="frm1" method="post" action="#" class="login100-form validate-form" >
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="uname" placeholder="Type your username" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password" required >
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="text-right p-t-8 p-b-31">
						<a href="recover.php">
							Forgot password?
						</a>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" >
								Login
							</button>
							
						
							
							<div class="container">
  




						</div>
					</div>
	
							
							
							
					<div class="flex-col-c p-t-155">
					
	
						<span class="txt1 p-b-17">
						
							Or 
						</span>

						<a href="Sign up.php" class="txt2">
							Sign Up
						</a>
						<a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							 Home Page
							
							<i class="fa fa-long-arrow-right m-l-5"></i></a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="Sign in/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Sign in/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Sign in/vendor/bootstrap/js/popper.js"></script>
	<script src="Sign in/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Sign in/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Sign in/vendor/daterangepicker/moment.min.js"></script>
	<script src="Sign in/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Sign in/vendor/countdowntime/countdowntime.js"></script>
	
<!--===============================================================================================-->
	<script src="Sign in/js/main.js"></script>

</body>
</html>