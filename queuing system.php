<?php
    session_start();
    require_once("queuing system_connection.php");

    // Fetch a distinct accountName from the queue_logs table
    $sql = "SELECT DISTINCT accountName FROM queue_logs";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="queuing system.css">
    <title>Queuing System</title>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <h1>Department of Education <br> Region III <br> SCHOOLS DIVISION OF SAN JOSE DEL MONTE </h1>
    </header>
    <h2>QUEUING SYSTEM</h2>
    <div class="scroll">
        <table id="table" border="1">
            <tr>
                <div class="headrow">
                    <th class="table-number">No.</th>
                    <th class="table-stock">Name:</th>
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <td>1</td>
                    <td><?php echo $row["accountName"]; ?></td>
                </div>
            </tr>
        </table>
    </div>
</body>
</html>
