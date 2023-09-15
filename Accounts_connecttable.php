<?php
//connect to table
$con = mysqli_connect("localhost", "root", "", "ris_propertyoffice");

if (isset($_POST['save'])) {
    $accountType = $_POST['accountType'];
    $accountName = $_POST['accountName'];
    $userPosition = $_POST['userPosition'];
    $userOffice = $_POST['userOffice'];
    $centerCode = $_POST['centerCode'];
    $depedEmail = $_POST['depedEmail'];
    $accountPass = $_POST['accountPass'];

    foreach ($accountType as $key => $value) {
        $existingaccountNumQuery = "SELECT COUNT(*) FROM ris_accounts WHERE accountType = '" . mysqli_real_escape_string($con, $value) . "'";
        $existingaccountkNumResult = mysqli_query($con, $existingaccountNumQuery);
        $accountNumCount = mysqli_fetch_array($existingaccountNumResult)[0];

        if ($accountNumCount == 0) {
            $insertQuery = "INSERT INTO ris_accounts (accountType, accountName, userPosition, userOffice, centerCode, depedEmail, accountPass) VALUES (
                '" . mysqli_real_escape_string($con, $accountType[$key]) . "','" . mysqli_real_escape_string($con, $accountName[$key]) . "','" . mysqli_real_escape_string($con, $userPosition[$key]) . "','" . mysqli_real_escape_string($con, $userOffice[$key]) . "','" . mysqli_real_escape_string($con, $centerCode[$key]) . "','" . mysqli_real_escape_string($con, $depedEmail[$key]) . "','" . mysqli_real_escape_string($con, $accountPass[$key]) . "')";
            $query = mysqli_query($con, $insertQuery);
                
        }
    }
       
    

    mysqli_close($con);
    header("Location: superadmin_inventory.php");
}
?>
