
<?php
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['message'])) {
	require("PHPMailer-master/class.phpmailer.php"); //you have to download this plugin from github.com - link is in documentation
	
	$firstname = 	$_POST['firstname'];
	$lastname = 	$_POST['lastname'];
	$email = 		$_POST['email'];
	$message = 		$_POST['message'];
	
	$mail = new PHPMailer();
	
	$mail->From = $email;
	$mail->CharSet = "UTF-8";
	$mail->FromName = $email;
	$mail->addAddress("hokienick@gmail.com"); 
	
	$mail->IsHTML(true);
	$name = $firstname . $lastname;
	$mail->Subject = $name." sent you an email";
	
	$mail->Body = $message."<br><br>".$name."<br>".$email."<br>".$phone."<br>";
	$mail->send();
}
?>  