<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ris_propertyoffice";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the data sent via POST
    $item_description = $_POST["item_description"];
    $quantity = $_POST["quantity"];
    $stock_number = $_POST["stock_number"];

    // Check if the item_description already exists in the usage_logs table
    $sql = "SELECT * FROM usage_logs WHERE item_description = '$item_description'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If the item_description exists, update the total_usage
        $item_description = $_POST["item_description"];
        $quantity = $_POST["quantity"];
        $stock_number = $_POST["stock_number"];
        $row = $result->fetch_assoc();
        $current_total_usage = $row["total_usage"];
        $new_total_usage = $current_total_usage + $quantity;

        $update_sql = "UPDATE usage_logs SET total_usage = '$new_total_usage' WHERE item_description = '$item_description'";
        if ($conn->query($update_sql) === TRUE) {
            echo "Quantity updated successfully.";
        } else {
            echo "Error updating quantity: " . $conn->error;
        }
    } else {
        // If the item_description doesn't exist, insert a new row
        $item_description = $_POST["item_description"];
        $quantity = $_POST["quantity"];
        $stock_number = $_POST["stock_number"];
        $insert_sql = "INSERT INTO usage_logs (stock_number, item_description, total_usage) VALUES ('$stock_number','$item_description', '$quantity')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "Quantity inserted successfully.";
        } else {
            echo "Error inserting quantity: " . $conn->error;
        }
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
