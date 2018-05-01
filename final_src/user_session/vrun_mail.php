<?php

    include_once  "dbh.inc.php";
    session_start();
     use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    

 
    $name = $_POST['name'];
    $sub = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
   
//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'blood11connect@gmail.com';                 // SMTP username
    $mail->Password = 'chomuismyname';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    $mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('noreply-blood11connect@gmail.com');
   // $mail->addAddress('prasad23kshirsagar@gmail.com');     // Add a recipient
   // $mail->addAddress('2016csb1124@iitrpr.ac.in');     // Add a recipient
    $mail->addAddress('2016csb1041@iitrpr.ac.in');     // Add a recipient
   // $mail->addAddress('2016csb1064@iitrpr.ac.in');     // Add a recipient
   // $mail->addAddress('2016csb1053@iitrpr.ac.in');     // Add a recipient
    
   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $sub;
    $mail->Body    = 'Name : '.$name.' <br> Email : '.$email.'<br> Message : '.$message.'<br>';
    
    $mail->send();
   
} catch (Exception $e) {
   // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

    
    

?>
