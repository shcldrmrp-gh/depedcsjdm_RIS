<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ris_propertyoffice";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = false;
$errors = array();

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

if (isset($_POST['btnRelease'])) {
    // Get the reference code and yearRequested from the form
    $referenceCode = $_POST['referenceCode'];
    $yearRequested = intval($_POST['yearRequested']); // Assuming yearRequested is in POST data

    // Increment the seriesNumber only once per request
    $lastSeriesNumber = getLastSeriesNumber($conn);
    $nextSeriesNumber = $lastSeriesNumber + 1;
    $formattedSeriesNumber = str_pad($nextSeriesNumber, 6, '0', STR_PAD_LEFT);

    // Retrieve data from the queue_logs table for the specific reference code
    $selectSql = "SELECT * FROM queue_logs WHERE referenceCode = '$referenceCode'";
    $result = mysqli_query($conn, $selectSql);

    if ($result) {
        // Loop through the result set to fetch all rows
        while ($row = mysqli_fetch_assoc($result)) {
            $yearRequested = intval($_POST['yearRequested']); // Assuming yearRequested is in POST data
            $risNoDate = $_POST['risNoDate'];
            $accountName = $row['accountName'];
            $centerCode = $row['centerCode'];
            $stock_number = $row['stock_number'];
            $item_description = $row['item_description'];
            $stock_unit = $row['stock_unit'];
            $quantityInput = $row['quantityInput'];
            $dateRequested = $row['dateRequested'];
            $userOffice = $row['userOffice'];

            // Construct the INSERT query for request_logs with interpolated values
            $insertSql = "INSERT INTO request_logs (userOffice, risNoDate, seriesNumber, yearRequested, accountName, centerCode, stock_number, item_description, stock_unit, quantityInput, formDate) VALUES (
                '$userOffice',
                '$risNoDate',
                '$formattedSeriesNumber',
                '$yearRequested',
                '$accountName',
                '$centerCode',
                '$stock_number',
                '$item_description',
                '$stock_unit',
                '$quantityInput',
                '$dateRequested'
            )";

            // Execute the INSERT query
            $insertResult = mysqli_query($conn, $insertSql);

            if ($insertResult) {
                // Data inserted into request_logs successfully

                // Delete data from the queue_logs table
                $deleteSql = "DELETE FROM queue_logs WHERE referenceCode = '$referenceCode'";
                $deleteResult = mysqli_query($conn, $deleteSql);

                if ($deleteResult) {
                    // Data deleted from queue_logs successfully
                    $success = true;
                } else {
                    $errors[] = 'Error deleting data from the database for referenceCode: ' . $referenceCode;
                }
            } else {
                $errors[] = 'Error inserting data into request_logs for referenceCode: ' . $referenceCode;
            }
        }
    } else {
        $errors[] = 'Error executing SELECT statement for referenceCode: ' . $referenceCode;
    }
} else {
    $errors[] = 'The button was not clicked.';
}

// Close the database connection
mysqli_close($conn);

if ($success && empty($errors)) {
    // Redirect to queueing_system.php
    header("Location: queuing system.php");
    exit(); // Terminate the script
}
// Return the response with success and errors
$response = [
    'success' => $success,
    'errors' => $errors,
];
echo json_encode($response);
?>