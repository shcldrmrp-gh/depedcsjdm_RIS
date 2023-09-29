<?php
session_start();
require_once("queuing system_connection.php");

if (isset($_POST['referenceCode'])) {
    $referenceCode = $_POST['referenceCode'];
    
    // Perform the database deletion operation based on the referenceCode
    $sql = "DELETE FROM queue_logs WHERE referenceCode = ?";
    $stmt = mysqli_prepare($con, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $referenceCode);
        if (mysqli_stmt_execute($stmt)) {
            // Data deleted successfully
            echo json_encode(['success' => true]);
        } else {
            // Error occurred while deleting data
            echo json_encode(['success' => false, 'error' => 'Error deleting data from the database.']);
        }
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the SQL statement
        echo json_encode(['success' => false, 'error' => 'Error preparing SQL statement.']);
    }
} else {
    // Reference code not provided
    echo json_encode(['success' => false, 'error' => 'Reference code not provided.']);
}

mysqli_close($con);

?>
