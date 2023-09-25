<?php
    // Ensure proper error handling and database connection establishment here.

    // Update the database table 'inventory' to subtract the given quantity from item_quantity.
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "ris_propertyoffice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $item_description = $_POST['item_description'];
        $quantity = $_POST['quantity'];
        $stock_number = $_POST["stock_number"];

        $sql = "UPDATE inventory SET item_quantity = item_quantity - $quantity WHERE item_description = '$item_description'";

        if ($conn->query($sql) === TRUE) {
            echo "Quantity updated successfully.";
        } else {
            echo "Error updating quantity: " . $conn->error;
        }
    }
    
    $conn->close();
?>
