<?php
session_start();
require_once("queuing system_connection.php");

// Initialize variables
$success = false;
$error = '';

// Delete data and update item_quantity
if (isset($_POST['referenceCode'])) {
    $referenceCode = $_POST['referenceCode'];

    // Retrieve the quantityInput value associated with the deleted referenceCode
    $quantityInput = 0; // Initialize quantityInput to 0

    $select_sql = "SELECT item_description, quantityInput FROM queue_logs WHERE referenceCode = ?";
    $stmt_select = mysqli_prepare($con, $select_sql);

    if ($stmt_select) {
        mysqli_stmt_bind_param($stmt_select, "s", $referenceCode);
        if (mysqli_stmt_execute($stmt_select)) {
            $result = mysqli_stmt_get_result($stmt_select);
            $row = mysqli_fetch_assoc($result);
            $item_description = $row['item_description'];
            $quantityInput = $row['quantityInput'];
            
            // Delete data from the queue_logs table
            $delete_sql = "DELETE FROM queue_logs WHERE referenceCode = ?";
            $stmt_delete = mysqli_prepare($con, $delete_sql);
            
            if ($stmt_delete) {
                mysqli_stmt_bind_param($stmt_delete, "s", $referenceCode);
                if (mysqli_stmt_execute($stmt_delete)) {
                    // Data deleted successfully

                    // Update item_quantity in the inventory table
                    $update_sql = "UPDATE inventory SET item_quantity = item_quantity + ? WHERE item_description = ?";
                    $stmt_update = mysqli_prepare($con, $update_sql);

                    if ($stmt_update) {
                        mysqli_stmt_bind_param($stmt_update, "ss", $quantityInput, $item_description);
                        if (mysqli_stmt_execute($stmt_update)) {
                            // Quantity input added to item_quantity successfully
                            $success = true;
                        } else {
                            $error = 'Error updating item_quantity.';
                        }
                        mysqli_stmt_close($stmt_update);
                    } else {
                        $error = 'Error preparing SQL statement for updating item_quantity.';
                    }
                } else {
                    $error = 'Error deleting data from the database.';
                }
                mysqli_stmt_close($stmt_delete);
            } else {
                $error = 'Error preparing SQL statement for deleting data.';
            }
        } else {
            $error = 'Error executing SELECT statement.';
        }
        mysqli_stmt_close($stmt_select);
    } else {
        $error = 'Error preparing SQL statement for SELECT.';
    }
} else {
    $error = 'Reference code not provided.';
}

// Close the database connection
mysqli_close($con);

// Return the response
$response = [
    'success' => $success,
    'error' => $error,
];
echo json_encode($response);
?>
