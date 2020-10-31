<?php


$mail=$_POST["mail"];


$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"capitalholdings");
$rep=0;
$rep=mysqli_num_rows(mysqli_query($con,"select * from users where E_mail='$mail'"));
if($rep==1)
{	$row=mysqli_fetch_array(mysqli_query($con,"select * from users where E_mail='$mail'"));
		$pass=$row[2];
		$ma=$row[5];
}
else
{
	echo "<script type='text/javascript'>alert('Invalid email address');
				window.location.replace('recover.php');</script>";
	
}


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'nibmprojectreset@gmail.com';                     // SMTP username
    $mail->Password   = 'projectpassword';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('nibmprojectreset@gmail.com','udeesha');
    $mail->addAddress("{$ma}");     // Add a recipient
    
    $mail->addReplyTo('nibmprojectreset@gmail.com');
  


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Recover - Capital Holdings Grand Venus ';
    $mail->Body    = 'This is your password  : '.$pass;
    $mail->AltBody = '';

    $mail->send();
    echo "<script type='text/javascript'>alert('Message has been sent.Check yout mail inbox');
				window.location.replace('Sign in.php');</script>";
} catch (Exception $e) {
    echo "<script type='text/javascript'>alert('Message could not be sent. Mailer Error');
				window.location.replace('Sign in.php');</script>";
}

?>


<html>
<head>
<meta charset="utf-8">

</head>

<body>
</body>
</html>