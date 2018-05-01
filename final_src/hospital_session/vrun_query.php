<?php

 include_once  "dbh.inc.php";


 $final_date = $_POST['final_date'];
 $final_time = $_POST['final_time'];
 $user_id = $_POST['user_id'];
 $hospital_id = $_POST['hospital_id'];
 $APPID = $_POST['appointment_id'];
// echo $final_date;
// echo "<br>";
// echo $final_time;
//echo "<br>";
// echo $user_id;
//echo "<br>";
 //echo $hospital_id;
 
 
 
$sql_query2 = "UPDATE appointment set final_date = '$final_date',final_time = '$final_time',hospital_pending = 0 where hospital_id = '$hospital_id' and user_id = '$user_id' and appointment_id = '$APPID'";	
$conn->query($sql_query2);   

$sql_query3 = "SELECT username,email_id FROM user WHERE user_id = '$user_id'";	
$result1 = $conn->query($sql_query3);
$row = $result1->fetch_assoc();
$myemail = $row['email_id'];
$myname = $row['username'];
echo 'Hello '.$row;                    

//$hospital_name = 'parmar';

$sql_query4 = "SELECT hospital_name FROM hospital WHERE hospital_id = '$hospital_id'";	
$result2 = $conn->query($sql_query4);
$row2 = $result2->fetch_assoc();
$hospital_name = $row2['hospital_name'];
//$myname = $row['username'];
//echo 'Hello '.$row;



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $mail->addAddress($myemail);     // Add a recipient
   // $mail->addAddress('2016csb1064@iitrpr.ac.in');     // Add a recipient
   // $mail->addAddress('2016csb1053@iitrpr.ac.in');     // Add a recipient
    
   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Blood Connect - Appointment Confirmation ';
    $mail->Body    = 'Dear '.$myname.", <br>". '    Your appointment has been confirmed.<br> Hospital Name: '.$hospital_name.'<br> Fixed Date: '.$final_date.'<br> Fixed Time: '.$final_time.' IST';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}



//$sql_query3 = "SELECT email_id FROM user WHERE user_id = '$user_id'";	
//$result1 = $conn->query($sql_query3);
//echo $result1;                    





?>
