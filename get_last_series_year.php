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

// Query to get the latest data in the seriesNumber and yearRequested columns
$sql = "SELECT MAX(seriesNumber) AS lastSeriesNumber, MAX(yearRequested) AS lastYear FROM request_logs";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastSeriesNumber = $row["lastSeriesNumber"];
    $lastYear = $row["lastYear"];
    $data = array("lastSeriesNumber" => $lastSeriesNumber, "lastYear" => $lastYear);
    echo json_encode($data);
} else {
    echo json_encode(array("lastSeriesNumber" => 0, "lastYear" => 0));
}

// Close the database connection
$conn->close();
?>