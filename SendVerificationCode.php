<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\depedcsjdm_RIS\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\depedcsjdm_RIS\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\depedcsjdm_RIS\PHPMailer-master\src\SMTP.php';
include('login.php');
session_start();

$email = $_POST['email'];

if(!empty($email)){

    $checkemail = "SELECT * FROM `ris_accounts` WHERE depedEmail = '$email'";
    $result = $conn->query($checkemail);
    if(mysqli_num_rows($result)>0){
        while($row = $result->fetch_assoc()){
            $admin_email  = $row['depedEmail'];           
        }
        
        $_SESSION['email_data'] = $admin_email;
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $code = rand(100000, 999999);
        $finalcode = $code;
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth=true;
        //sender username
        $mail ->Username = 'schoolsdivisionoffice@gmail.com';
        //two way pass
        $mail ->Password = 'dohbihlwmzwlzobk';
        $mail ->SMTPSecure='ssl';
        $mail ->Port='465';
        //sender
        $mail ->setFrom('schoolsdivisionoffice@gmail.com','Division Office CSJDM');
        //receiver
        $mail -> addAddress($admin_email);
        $mail->isHTML(true);
        $mail->Subject='Verification Code';
        $mail->Body="Your Verification code is: ".$finalcode;
        
        $sendcode = "INSERT INTO verificationcode (`code`,`email`) VALUES ('$finalcode','$admin_email')";
        $conn->query($sendcode);
        $mail->send();
        $status = "success";
    }else{
    $status = "email does not exists";
    }
   
}
else{
    $status = "Empty Input field";
}



echo $status;



?>
