<?php

include("login.php");
require("databaseConnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountName = $_SESSION['accountName'];
    $userOffice = $_SESSION['userOffice'];
    $centerCode = $_SESSION['centerCode'];
    $userPosition = $_SESSION['userPosition'];
    $item_descriptions = $_POST['item_description'];
    $stockNumbers = $_POST['stock_number'];
    $stockUnits = $_POST['stock_unit'];
    $quantities = $_POST['quantity'];
    $formDate = $_POST['formDate'];
    $risNoDate = $_POST['risNoDate'];
    $purpose = $_POST['purpose'];
    $referenceCode = rand(100000, 999999);
    $finalReferenceCode = $referenceCode;
    $yearRequested = intval(date("Y"));

    $success = true;
    $errorMessage = "";

    // Start a transaction
    $conn->begin_transaction();

    for ($i = 0; $i < count($item_descriptions); $i++) {
        // Check if the array key exists before accessing it
        $item_description = isset($item_descriptions[$i]) ? $item_descriptions[$i] : '';
        $stockNumber = isset($stockNumbers[$i]) ? $stockNumbers[$i] : '';
        $stockUnit = isset($stockUnits[$i]) ? $stockUnits[$i] : '';
        $quantity = isset($quantities[$i]) ? $quantities[$i] : '';

        // Check if the item_description is not empty and not equal to "noValue"
        if (!empty($item_description) && $item_description !== 'noValue') {
            // Insert data into the queue logs
            $insert_sql = "INSERT INTO queue_logs VALUES ('$finalReferenceCode', '$yearRequested', '$accountName', '$userPosition', '$centerCode', '$userOffice', '$stockNumber', '$item_description', '$stockUnit', '$quantity', '$purpose', '$formDate')";

            if (!$conn->query($insert_sql)) {
                $success = false;
                $errorMessage = "Error inserting data into queue logs: " . $conn->error;
                break; // Exit the loop on error
            }

            // Update item_quantity in the inventory table
            $update_sql = "UPDATE inventory SET item_quantity = item_quantity - $quantity WHERE item_description = '$item_description'";

            if (!$conn->query($update_sql)) {
                $success = false;
                $errorMessage = "Error updating item_quantity in inventory: " . $conn->error;
                break; // Exit the loop on error
            }
        }
    }

    // Commit or rollback the transaction
    if ($success) {
        $conn->commit();
        echo json_encode(array("success" => true));
    } else {
        $conn->rollback();
        echo json_encode(array("success" => false, "message" => $errorMessage));
    }

    $conn->close();
}
?>