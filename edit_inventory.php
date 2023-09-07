<?php
// Connect to the database
$con = mysqli_connect('localhost', 'user', '', 'ris_propertyoffice');

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $selectedItem = $_POST["selected_item"];
    $addQuantity = $_POST["add_quantity"];

    // Retrieve the current quantity for the selected item
    $sql = "SELECT item_quantity FROM inventory WHERE stock_number = '$selectedItem'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentQuantity = $row["item_quantity"];

        // Calculate the new quantity
        $newQuantity = $currentQuantity + $addQuantity;

        // Update the quantity in the database
        $updateSql = "UPDATE inventory SET item_quantity = $newQuantity WHERE stock_number = '$selectedItem'";
        if (mysqli_query($con, $updateSql)) {
            mysqli_close($con);
            header("Location: usermanagement.php");
            
        } 
    } 
    
}
?>

