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
    
    // Get the yearRequested value from the POST data
    $yearRequested = intval($_POST['yearRequested']);

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

    $insertedSuccessfully = true;

    // Loop through the submitted data and insert it into the database
    for ($i = 0; $i < count($item_descriptions); $i++) {
        $item_description = $item_descriptions[$i];
        $stockNumber = $stockNumbers[$i];
        $stockUnit = $stockUnits[$i];
        $quantity = $quantities[$i];

        // Check if the item_description is not equal to "noValue" before inserting
        /*if ($item_description != "noValue") {
            // SQL query to insert data into the request_logs table
            $sql = "INSERT INTO request_logs (accountName, item_description, stock_number, stock_unit, quantityInput, formDate, seriesNumber, risNoDate, userOffice, centerCode, yearRequested)
                VALUES ('$accountName', '$item_description', '$stockNumber', '$stockUnit', '$quantity', '$formDate', '$formattedSeriesNumber', '$risNoDate', '$userOffice', '$centerCode', '$yearRequested')";

            if ($conn->query($sql) === TRUE) {
                // Data inserted successfully
                header("endUser_webpage.php");
            } else {
                // Error occurred while inserting data
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }*/

        if ($item_description != "noValue") {
            // SQL query to insert data into the request_logs table
            $sql = "INSERT INTO queue_logs VALUES ('$finalReferenceCode','$accountName', '$userPosition' ,'$centerCode', '$userOffice', '$stockNumber', '$item_description', '$stockUnit','$quantity','$purpose','$formDate')";
            if ($conn->query($sql) !== TRUE) {
                // Error occurred while inserting data
                $insertedSuccessfully = false;
                echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    }

    // Close the database connection
    
    $conn->close();

// Check if data was inserted successfully before redirection
    if ($insertedSuccessfully) {
        // Redirect the user to endUser_webpage.php
        header("Location: endUser_webpage.php");
        exit();
    } else {
        echo "Data was not inserted successfully. Please check the errors above.";
    }
}
?>
