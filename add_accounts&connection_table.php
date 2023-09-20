<?php
//connect to table
$con = mysqli_connect("localhost", "root", "", "ris_propertyoffice");

if (isset($_POST['register'])) {
    $accountType = $_POST['account_Type'];
    $accountName = $_POST['account_Name'];
    $userPosition = $_POST['user_Position'];
    $userOffice = $_POST['user_Office'];
    $centerCode = $_POST['center_Code'];
    $depedEmail = $_POST['deped_Email'];
    $accountPass = $_POST['account_Pass'];

    foreach ($depedEmail as $key => $value) {
        $existingdepedEmailNumQuery = "SELECT COUNT(*) FROM ris_accounts WHERE depedEmail = '" . mysqli_real_escape_string($con, $value) . "'";
        $existingdepedEmailResult = mysqli_query($con, $existingdepedEmailNumQuery);
        $depedEmailCount = mysqli_fetch_array($existingdepedEmailResult)[0];

        if ($depedEmailCount == 0) { // Fix the variable name here
            $insertQuery = "INSERT INTO ris_accounts (accountType, accountName, userPosition, userOffice, centerCode, depedEmail, accountPass) VALUES (
                '" . mysqli_real_escape_string($con, $accountType[$key]) . "','" . mysqli_real_escape_string($con, $accountName[$key]) . "','" . mysqli_real_escape_string($con, $userPosition[$key]) . "','" . mysqli_real_escape_string($con, $userOffice[$key]) . "','" . mysqli_real_escape_string($con, $centerCode[$key]) . "','" . mysqli_real_escape_string($con, $depedEmail[$key]) . "','" . mysqli_real_escape_string($con, $accountPass[$key]) . "')";
            $query = mysqli_query($con, $insertQuery);
                
        }
    }
       
    mysqli_close($con);
    header("Location: Accounts_inventory.php");
}


?>
