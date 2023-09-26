<?php
session_start();
require_once("queuing system_connection.php");

if (isset($_POST['referenceCode'])) {
    $referenceCode = $_POST['referenceCode'];

    // Perform a SQL DELETE query to remove the record with the given referenceCode
    $sql = "DELETE FROM queue_logs WHERE referenceCode = '$referenceCode'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Return a success message or response if needed
        echo "Record deleted successfully";
    } else {
        // Handle errors if the delete query fails
        echo "Error deleting record: " . mysqli_error($con);
    }
}
header("Location: queuing system.php")
?>
