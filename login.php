<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DepEd CSJDM Requisition and Issue Slip Form</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="icon" type="image/x-icon" href="logos/depedcsjdmlogo.png">
    <link rel="stylesheet" href="homepage_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
</body>
</html>

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
            $_SESSION['accountName'] = $row['accountName'];
            $_SESSION['userPosition'] = $row['userPosition'];
            $_SESSION['centerCode'] = $row['centerCode'];
            $_SESSION['userOffice'] = $row['userOffice'];
            $_SESSION['depedEmail'] = $row['depedEmail'];
            
            $accountType = $row['accountType'];
            if ($accountType == 'End User') {
                echo'<script>
                        Swal.fire({
                            icon: "success",
                            title: "LOGIN SUCCESSFUL!",
                            text: "Redirecting to E-RIS Form...",
                            showConfirmButton: false,
                            timer: 3000, // 5 seconds
                            timerProgressBar: true
                        }).then(function() {
                            window.location.href = "endUser_webpage.php"; // Replace with the desired destination page
                        });
                    </script>';
            } elseif ($accountType == 'User Manager') {
                echo'<script>
                        Swal.fire({
                            icon: "success",
                            title: "LOGIN SUCCESSFUL!",
                            text: "Redirecting to user manager admin page...",
                            showConfirmButton: false,
                            timer: 3000, // 5 seconds
                            timerProgressBar: true
                        }).then(function() {
                            window.location.href = "usermanagement.php"; // Replace with the desired destination page
                        });
                    </script>';
            } elseif ($accountType == 'Super Admin') {
                echo'<script>
                        Swal.fire({
                            icon: "success",
                            title: "LOGIN SUCCESSFUL!",
                            text: "Redirecting to super admin page...",
                            showConfirmButton: false,
                            timer: 3000, // 5 seconds
                            timerProgressBar: true
                        }).then(function() {
                            window.location.href = "Accounts_inventory.php"; // Replace with the desired destination page
                        });
                    </script>';
            } else {
                echo'<script>
                    Swal.fire({
                        icon: "error",
                        title: "LOGIN FAILED!",
                        text: "Invalid DepEd E-mail or password.",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location.href = "homepage.php";
                    });
                </script>';
            }
        } else {
            echo'<script>
                Swal.fire({
                    icon: "error",
                    title: "LOGIN FAILED!",
                    text: "Invalid DepEd E-mail or password.",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "homepage.php";
                });
            </script>';
        }
    }
?>