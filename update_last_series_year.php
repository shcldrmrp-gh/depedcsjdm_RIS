<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastSeriesNumber = intval($_POST['lastSeriesNumber']);
    $lastYear = intval($_POST['lastYear']);

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

    // Update the last series number and year in the database
    $sql = "INSERT INTO request_logs (seriesNumber, yearRequested) VALUES ('$lastSeriesNumber', '$lastYear')";

    if ($conn->query($sql) === TRUE) {
        echo "Last series number and year updated successfully.";
    } else {
        echo "Error updating last series number and year: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
