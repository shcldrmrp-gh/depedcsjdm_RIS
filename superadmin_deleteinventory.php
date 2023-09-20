<?php
// Connect to the database
$con = mysqli_connect('localhost', 'user', '', 'ris_propertyoffice');

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form has been deletion
if (isset($_POST["delete_item"])) {
    // Get the selected item from the dropdown
     $selectedItem = $_POST["item"];

    // Perform the deletion query
    $sql = "DELETE FROM inventory WHERE item_description = '$selectedItem'";

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        header("Location: superadmin_inventory.php");   
    }                             
}
?>