
<?php
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['message'])) {
	require 'PHPMailer-master/PHPMailerAutoload.php'; //you have to download this plugin from github.com - link is in documentation
	include 'ChromePhp.php';
	
	$firstname = 	$_POST['firstname'];
	$lastname = 	$_POST['lastname'];
	$email = 		$_POST['email'];
	$message = 		$_POST['message'];
	
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 3;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; //Set the encryption system to use - ssl (deprecated) or tls
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
	$mail->Username = 'laserlotusproductions@gmail.com';  
	$mail->Password = 'Nachos11!';          
	$mail->From = $email;
	$name = $firstname . " " . $lastname;
	ChromePhp::log("added name: ",$name);
	$mail->Subject = $name." sent you an email";
	ChromePhp::log("added subject");
	$mail->Body = $message."<br><br>".$name."<br>".$email."<br>".$phone."<br>";
	ChromePhp::log("Added Body");
	$mail->addAddress("hokienick@gmail.com"); 
	ChromePhp::log("Added Address and about to send");

	if(!$mail->Send()) {
		ChromePhp::log("Mail error: ", $mail->ErrorInfo);
		return false;
	} else {
		ChromePhp::log("Message seemed to have sent fine");
		$error = 'Message sent!';
		return true;
	}
	ChromePhp::log("Did we make it to the end?");
}
?>  