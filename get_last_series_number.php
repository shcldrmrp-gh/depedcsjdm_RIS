<?php
session_start();

// Assuming you have a database connection
require("databaseConnection.php");

// Query to get the latest data in the seriesNumber column
$sql = "SELECT seriesNumber FROM request_logs ORDER BY seriesNumber DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastSeriesNumber = $row["seriesNumber"];
    echo $lastSeriesNumber;
} else {
    echo "0"; // If no data is available, return 0
}

// Close the database connection
$conn->close();
?>