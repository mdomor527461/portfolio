<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../../config/database.php';

include '../../src/PHPMailer.php';
include '../../src/SMTP.php';
include '../../src/Exception.php';

if(isset($_POST['email_sender'])){

    $sander_name = $_POST['name'];
    $sander_email = $_POST['email'];
    $sander_body = $_POST['body'];

    if($sander_name && $sander_email && $sander_body){

        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'md3147693@gmail.com';                     
            $mail->Password   = 'mrxe yfgk auok dfll';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
            $mail->Port       = 587;                                    

            //Recipients
            $mail->setFrom($mail->Username, 'Omor faruk');
            $mail->addAddress($sander_email, $sander_name);     
            $mail->addReplyTo($mail->Username);

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Welcome to our portfolio site.';
            $mail->Body    = $sander_body;
            
            if($mail->send()){
                echo "dgdsagadsgd";
                $insert = "INSERT INTO emails (name,email,body) VALUES ('$sander_name','$sander_email','$sander_body')";
                mysqli_query($db,$insert);
                header('location: ../../index.php#contact');
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}

?>
