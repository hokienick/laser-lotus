<?php 

 require_once('class.phpmailer.php');
 require 'PHPMailerAutoload.php';
 include 'ChromePhp.php';
    
    $firstname =   $_POST['firstname'];
    $lastname =    $_POST['lastname'];
    $email =       $_POST['email'];
    $message =     $_POST['message'];

    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->Username = "hokienick@gmail.com";
    $mail->Password = "7AYF#eVO#UAIuZ";
    $mail->SMTPSecure = "ssl";  
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
 
    $mail->setFrom('hokienick@gmail.com', 'Nick Castillo', 0);
    $mail->addAddress("hokienick@gmail.com");
 
    $mail->Subject  =  'CONTACT via Personal Website';
    $mail->IsHTML(true);
    $mail->Body    = $message."<br><br>"."Name: ".$firstname." ".$lastname."<br>".$email."<br>".$phone."<br>";
    
     if($mail->send())
     {
        ChromePhp::log('SUCCESS!');
        echo "Message sent!";
     }
     else
     {
        ChromePhp::log($mail->ErrorInfo);
        echo "Mailer Error: " . $mail->ErrorInfo;
     }
  
?>