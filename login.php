<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "ris_propertyoffice";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_POST['login'])){
        $loginEmail = $_POST['loginEmail'];
        $loginPass = $_POST['loginPass'];

        $sql = "SELECT * FROM ris_accounts WHERE depedEmail = '$loginEmail' AND accountPass = '$loginPass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count==1 ){
            header("Location:endUser_webpage.php");
            $_SESSION['accountName'] = $row['accountName'];
            $_SESSION['userPosition'] = $row['userPosition'];
            $_SESSION['centerCode'] = $row['centerCode'];
            $_SESSION['userOffice'] = $row['userOffice'];
        } else{
            echo '<script>
                alert("Login failed. Invalid DepEd E-mail or password.")
                window.location.href = "homepage.php";
                </script>';
        };
    };
?>