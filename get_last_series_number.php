<?php
session_start();

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ris_propertyoffice";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the latest data in the seriesNumber column
$sql = "SELECT seriesNumber FROM request_logs ORDER BY seriesNumber DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $latestSeriesNumber = $row["seriesNumber"];
    echo $latestSeriesNumber;
} else {
    echo "0"; // If no data is available, return 0
}

// Close the database connection
$conn->close();
?>