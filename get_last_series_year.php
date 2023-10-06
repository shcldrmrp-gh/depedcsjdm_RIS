<?php
session_start();

// Assuming you have a database connection
require("databaseConnection.php");

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