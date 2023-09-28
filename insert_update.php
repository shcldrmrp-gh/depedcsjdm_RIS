<?php
// Ensure proper error handling and database connection establishment here.

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

    // Ensure quantity doesn't go below 0
    $sql = "UPDATE inventory SET item_quantity = CASE
            WHEN item_quantity >= $quantity THEN item_quantity - $quantity
            ELSE 0
            END
            WHERE item_description = '$item_description'";

    if ($conn->query($sql) === TRUE) {
        // Now, insert data into the queue logs
        $insert_sql = "INSERT INTO queue_logs (item_description, quantity, stock_number) 
                      VALUES ('$item_description', $quantity, '$stock_number')";

        if ($conn->query($insert_sql) === TRUE) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "message" => "Error inserting data into queue logs: " . $conn->error));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Error updating quantity: " . $conn->error));
    }
}

$conn->close();
?>
