<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', 'root', 'ris_propertyoffice');

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form has been deletion
if (isset($_POST["delete_account"])) {
    // Get the selected item from the dropdown
     $selectedItem = $_POST["selected_item_delete"];

    // Perform the deletion query
    $sql = "DELETE FROM ris_accounts WHERE depedEmail = '$selectedItem'";

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        header("Location: Accounts_inventory.php");   
    }                             
}
?>