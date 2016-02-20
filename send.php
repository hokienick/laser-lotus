<?php
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['message'])) {
	require('PHPMailer-master/PHPMailerAutoload.php'); //you have to download this plugin from github.com - link is in documentation
	
	$firstname = 	$_POST['firstname'];
	$lastname = 	$_POST['lastname'];
	$email = 		$_POST['email'];
	$message = 		$_POST['message'];
	
	$mail = new PHPMailer();

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();

	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 2;

	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';

	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6

	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;

	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';

	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;

	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "nicastil@vt.edu";

	//Password to use for SMTP authentication
	$mail->Password = "Nachos11!";


	//formulate email
	//Set who the message is to be sent from
	$name = $firstname . $lastname;
	$mail->setFrom($email, $name);
	$mail->CharSet = "UTF-8";
	$mail->addAddress("hokienick@gmail.com"); 
	
	$mail->IsHTML(true);

	$mail->Subject = $name." sent you an email from your website";
	
	$mail->AltBody = $message."<br><br>".$name."<br>".$email"<br>";

	$mail->send();
}
?>   
            