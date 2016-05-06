<?php 

 require_once('class.phpmailer.php');
 
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "hokienick@gmail.com";
    $mail->Password = "7AYF#eVO#UAIuZ";
    $mail->SMTPSecure = "ssl";  
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
 
    $mail->setFrom('hokienick@gmail.com', 'Nick Castillo');
 
    $mail->Subject  =  'Mail from your website';
    $mail->IsHTML(true);
    $mail->Body    = 'Hi there ,
                        <br />
                        this mail was sent using PHPMailer...
                        <br />
                        cheers... :)';
  
     if($mail->Send())
     {
        echo "Message was Successfully Sent :)";
     }
     else
     {
        echo "Mail Error - >".$mail->ErrorInfo;
     }
  
?>