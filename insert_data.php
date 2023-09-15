<?php
session_start();

// Function to get the last series number from the database
function getLastSeriesNumber($conn) {
    $sql = "SELECT MAX(seriesNumber) AS lastSeriesNumber FROM request_logs";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return intval($row["lastSeriesNumber"]);
    } else {
        return 0; // If no data is available, return 0
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs from the form
    $accountName = $_SESSION['accountName'];
    $userOffice = $_SESSION['userOffice'];
    $itemDescriptions = $_POST['item_description'];
    $stockNumbers = $_POST['stock_number'];
    $stockUnits = $_POST['stock_unit'];
    $quantities = $_POST['quantity'];
    $formDate = $_POST['formDate'];
    $risNoDate = $_POST['risNoDate'];

    // Assuming you have a database connection, insert data into the database
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

    // Get the last series number and increment it
    $lastSeriesNumber = getLastSeriesNumber($conn);
    $nextSeriesNumber = $lastSeriesNumber + 1;
    
    // Format the next series number as a 6-digit string
    $formattedSeriesNumber = str_pad($nextSeriesNumber, 6, '0', STR_PAD_LEFT);

    // Loop through the submitted data and insert it into the database
    for ($i = 0; $i < count($itemDescriptions); $i++) {
        $itemDescription = $itemDescriptions[$i];
        $stockNumber = $stockNumbers[$i];
        $stockUnit = $stockUnits[$i];
        $quantity = $quantities[$i];

        // Check if the itemDescription is not equal to "noValue" before inserting
        if ($itemDescription != "noValue") {
            // SQL query to insert data into the request_logs table
            $sql = "INSERT INTO request_logs (accountName, item_description, stock_number, stock_unit, quantityInput, formDate, seriesNumber, risNoDate, userOffice)
                    VALUES ('$accountName', '$itemDescription', '$stockNumber', '$stockUnit', '$quantity', '$formDate', '$formattedSeriesNumber', '$risNoDate', '$userOffice')";

            if ($conn->query($sql) === TRUE) {
                // Data inserted successfully
                header("endUser_webpage.php");
            } else {
                // Error occurred while inserting data
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Close the database connection
    $conn->close();
}
?>
