
<?php
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['message'])) {
	require 'PHPMailer-master/class.phpmailer.php'; //you have to download this plugin from github.com - link is in documentation
	include 'ChromePhp.php'
	
	$firstname = 	$_POST['firstname'];
	$lastname = 	$_POST['lastname'];
	$email = 		$_POST['email'];
	$message = 		$_POST['message'];
	
	ChromePhp::log('Hello lets start');
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = 'laserlotusproductions@gmail.com';  
	$mail->Password = 'Nachos11!';        
	ChromePhp::log('In the middle now');   
	$mail->From = $email;
	$name = $firstname . $lastname;
	$mail->Subject = $name." sent you an email";
	$mail->Body = $message."<br><br>".$name."<br>".$email."<br>".$phone."<br>";
	$mail->addAddress("hokienick@gmail.com"); 
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
	
	$mail->From = $email;
	$mail->CharSet = "UTF-8";
	$mail->FromName = $email;
	$mail->addAddress("hokienick@gmail.com"); 
	
	$mail->IsHTML(true);
	
	
	$mail->Body = $message."<br><br>".$name."<br>".$email."<br>".$phone."<br>";

	ChromePhp::log('Did we make it to the end?');

	//send the message, check for errors
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";
	}
}
?>  