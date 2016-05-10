<?php 

 require_once('class.phpmailer.php');
 require 'PHPMailerAutoload.php';
 include 'ChromePhp.php';
    
    $firstname =   $_POST['firstname'];
    $lastname =    $_POST['lastname'];
    $email =       $_POST['email'];
    $message =     $_POST['message'];

    $mail = new PHPMailerOAuth;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Set AuthType
    $mail->AuthType = 'XOAUTH2';

    //User Email to use for SMTP authentication - Use the same Email used in Google Developer Console
    $mail->oauthUserEmail = "hokienick@gmail.com";

    //Obtained From Google Developer Console
    $mail->oauthClientId = "583615294289-60dmi7fcohurkq40af7ej50o49s7p08d.apps.googleusercontent.com";

    //Obtained From Google Developer Console
    $mail->oauthClientSecret = "3dZ9w0MCWphs1zyExMtxwdaQ";

    //Obtained By running get_oauth_token.php after setting up APP in Google Developer Console.
    //Set Redirect URI in Developer Console as [https/http]://<yourdomain>/<folder>/get_oauth_token.php
    // eg: http://localhost/phpmail/get_oauth_token.php
    $mail->oauthRefreshToken = "1/1NcG7x_YgpaA_77mykOdRMU7OERvpNoyLtIyh4KPLZsMEudVrK5jSpoR30zcRFq6";

    //Set who the message is to be sent from
    //For gmail, this generally needs to be the same as the user you logged in as
    $mail->setFrom('hokienick@gmail.com', 'Nick Castillo');

    //Set who the message is to be sent to
    $mail->addAddress('hokienick@gmail.com');

    //Set the subject line
    $mail->Subject = 'A message from your website';

    //Replace the plain text body with one created manually
    $mail->AltBody = $message."<br><br>"."Name: ".$firstname." ".$lastname."<br>".$email."<br>".$phone."<br>";

    //send the message, check for errors
    if (!$mail->send()) {
        ChromePhp::log($mail->ErrorInfo)
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        ChromePhp::log("WE WIN!")
        echo "Message sent!";
    }
      
?>