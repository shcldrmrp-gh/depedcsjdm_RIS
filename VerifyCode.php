<?php
    include('login.php');
    session_start();

    $email_data = $_SESSION['email_data'];

    $verifycode = $_POST['code'];
    $getcode = "SELECT * FROM verificationcode WHERE email ='$email_data'";
    $result = $conn->query($getcode);
    if(mysqli_num_rows($result)>0){

        while( $row = $result->fetch_assoc()){
            $vcode = $row ['code'];

            if(empty($verifycode)){
                $status = "code field is empty";
            } else if($verifycode != $vcode){
                $status = "code not match";
            }
            else{
    
            $sql = "DELETE FROM verificationcode WHERE email = '$email_data'";
            $conn->query($sql); 
        
            $status = "code match";
            
            }
        }

        
    }else{
        $status = "error fetching code";
    }
   
    echo $status;
?>