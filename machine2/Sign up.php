<?php
if(isset($_POST["uname"]))
{	
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$emal=$_POST["emal"];
	$uname=$_POST["uname"];
	$pass=$_POST["pass"];
	$tel=$_POST["tel"];
	$add=$_POST["add"];

			function checkExist($usrname,$eml){
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://localhost:8015/customer/checkExist?uname=".$usrname."&email=".$eml."",
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
			
			function send($fnamee,$lnamee,$eml,$unme,$passw,$tele,$addr)
			{
				

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://localhost:8015/mail/",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS =>"{\"firstName\": \"$fnamee\",\"lastName\": \"$lnamee\",\"email\": \"$eml\",\"add\":\"$addr\",\"tel\":\"$tele\",\"username\":\"$unme\",\"password\":\"$passw\"}",
				  CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json"
				  ),
				));

				$response = curl_exec($curl);

				curl_close($curl);
			

					
					
				
			}
	if(checkExist($uname,$emal)==1)
	{	echo"
		<script type='text/javascript'>
		alert('User Name or Email already used..please try again with different user name/email');
		window.location.replace('Sign up.php');
		</script>";
	}
	else
	{
	
		send($fname,$lname,$emal,$uname,$pass,$tel,$add);
		echo"
		<script type='text/javascript'>
		alert('Account will active in few minutes');
		window.location.replace('Sign in.php');
		</script>";
	}


}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="text/css" href="images/rgv.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign up/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign up/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign up/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign up/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign up/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Sign up/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign up/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign up/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Sign up/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Sign up/css/util.css">
	<link rel="stylesheet" type="text/css" href="Sign up/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100" >
			<div class="login100-more" style="background-image: url(images/bg_2.jpg); "></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50"">
				<form class="login100-form validate-form" method="post" action="#" name="frm1" id="frm1">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input" >
						<span class="label-input100">First Name</span>
						<input name="fname" class="input100" type="text" placeholder="First Name..." id="fname" maxlength="20" pattern="[A-Za-z]">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Last Name</span>
						<input name="lname" class="input100" type="text" placeholder="Last Name..." id="lname" maxlength="15" pattern="[A-Za-z]{3}">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Address</span>
						<input name="add" class="input100" type="text" placeholder="Address..." id="add" maxlength="40">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input name="emal" class="input100" type="email" placeholder="Email address..." id="mail" maxlength="40">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Telephone Number</span>
						<input name="tel" class="input100" type="text" placeholder="Telephone..." id="tel" maxlength="40">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input name="uname" class="input100" type="text"  placeholder="Username..." id="uname" maxlength="15" pattern="[A-Za-z]{3}">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input name="pass" id="pass1" class="input100" type="password"  placeholder="*************" maxlength="25">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" id="pass2" type="password" name="repeat-pass" placeholder="*************" maxlength="25">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="terms" type="checkbox" name="remember-me" >
							<label class="label-checkbox100" for="terms">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="button" onClick="verify()" class="login100-form-btn">
								Sign Up
							</button>
						</div>

						<a href="Sign in.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
							
						<a href="index.php" align="right" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							 Home Page
							
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="Sign up/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Sign up/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Sign up/vendor/bootstrap/js/popper.js"></script>
	<script src="Sign up/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Sign up/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Sign up/vendor/daterangepicker/moment.min.js"></script>
	<script src="Sign up/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Sign up/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Sign up/js/main.js"></script>
    <script type="text/javascript"> 
	function verify()
	{	
		var flag=0;
	 var test= "Fix These errors" ;
	 var test2= "Password " ;
	 	var letters = /^[A-Za-z]+$/;
	
		if(document.getElementById('fname').value=="" || (!(document.getElementById('fname').value.match(letters))) )
		{
			test=test+"\n-Please fill First name and letters only";
			flag=1;
		}
		if(document.getElementById('lname').value==""  || (!(document.getElementById('lname').value.match(letters))) )
		{
			test=test+"\n-Please fill Last name and letters only";
			flag=1;
		}
		if(document.getElementById('add').value=="")
		{	
			test=test+"\n-Please enter address";
			flag=1;
		}
		if(document.getElementById('tel').value=="")
		{	
			test=test+"\n-Please enter telephone number";
			flag=1;
		}
		if(isNaN(document.getElementById('tel').value))
		{	
			test=test+"\n-Telephone number cannot contain letters";
			document.getElementById('tel').value="";
			flag=1;
		}
	 	if(document.getElementById('mail').value=="")
		{	
			test=test+"\n-Please enter E mail";
			flag=1;
		}
		if(document.getElementById('uname').value==""  || (!(document.getElementById('uname').value.match(letters))) )
		{	
			test=test+"\n-Please enter user name and letters only";
			flag=1;
		}			
		if(document.getElementById('pass1').value=="")
		{
			test=test+"\n-Please enter password";
			flag=1;
		}
		
		if(document.getElementById('pass2').value=="")
		{
			test=test+"\n-Please repeat the password";
			flag=1;
		}
		if(document.getElementById('pass1').value!==document.getElementById('pass2').value)
		{	
						test=test+"\n-Passwords did not match";
						document.getElementById('pass1').value="";
						document.getElementById('pass2').value="";
						flag=1;
		}	
		else
		{
						
					if(document.getElementById('pass1').value.length < 6) 
					{
							test2=test2+"\n-Password must contain at least six characters!";
							frm1.pass1.focus();
								flag=2;
						
					}
					
					if(document.getElementById('pass1').value == document.getElementById('uname').value) 
					{
							test2=test2+"\n-Password must be different from Username!";
							frm1.pass1.focus();
								flag=2;
							
					}
					re = /[0-9]/;
					if(!re.test(document.getElementById('pass1').value)) {
							test2=test2+"\n-password must contain at least one number (0-9)!";
							frm1.pass1.focus();
								flag=2;
					
					}
					re = /[a-z]/;
					if(!re.test(document.getElementById('pass1').value)) {
							test2=test2+"\n-password must contain at least one lowercase letter (a-z)!";
							frm1.pass1.focus();
								flag=2;
							
					}
					re = /[A-Z]/;
					if(!re.test(document.getElementById('pass1').value)) {
							test2=test2+"\n-password must contain at least one uppercase letter (A-Z)!";
							frm1.pass1.focus();
								flag=2;
							
					} 
		
		}
		if(document.getElementById('terms').checked==false)
		{
			test=test+"\n-Please accept the terms";
			flag=1;
		}		
				if(flag==0)
					document.getElementById("frm1").submit();
				else if(flag==1)
					alert(test);
				else if(flag==2) 
				alert(test2);
		}
	</script>

</body>
</html>