<?php
    session_start();
    require_once("usagelogs_connection.php");
    $query = "select * from usage_logs";
    $result = mysqli_query($con,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usage Logs</title>
    <link rel="stylesheet" href="usage_logs.css">
    <link rel="website icon" type="png" href="logo/depedcsjdmlogo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<header>
        <img src="logo/depedlogo.png" alt="">
        <h1>DEPARTMENT OF EDUCATION <br> REGION III <br> SCHOOLS DIVISION OF SAN JOSE DEL MONTE </h1>
        <input class ="menu_checkbox" type="checkbox" name="" id="check">
        <div class="container">
            <label for="check">
                <span> <i class='bx bxs-x-circle' id="times"></i> </span>
                <span><i class='bx bx-menu' id="bars"></i></span>
            </label>
            <div class="head">Menu</div>
            <ol>
                <li><a href="superadmin_inventory.php"><i class='bx bx-table'></i>Item Inventory</a></li>
                <li><a href="Accounts_inventory.php"><i class='bx bxs-user-account'></i>Accounts</a></li>
                <li><a href="request_logs.php"><i class='bx bx-git-pull-request' ></i>Request Logs</a></li>
                <li><a href="usermanager_logs.php"><i class='bx bxs-user-detail' ></i>User Manager</a></li>
                <li><a href="usage_logs.php"><i class='bx bx-bar-chart-alt-2'></i>Usage Logs</a></li>
                <li><a href="logout.php"><i class='bx bx-exit'></i>Logout</a></li>
            </ol>
        </div>
        <button type="button" class="convertbtn" name="convert_excel" id="convert_excel"  onclick="exportTableToExcel('table')">Convert To Excel</button>         
    </header>
    <h2>USAGE LOGS</h2>
    <div class="scroll">
        <table id="table" border="1">
            <tr>
                <div class="headrow">
                    <th class="stock-number">Stock no.</th>
                    <th class="item-description">Item Description</th>
                    <th class="total-usage">Total Usage</th>
                    
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <?php
                        $selectQuery = "SELECT * FROM usage_logs";
                        $result = mysqli_query($con, $selectQuery);
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                        
                        <td class ="align-stock-number"><?php echo $row["stock_number"];?></td>
                        <td class ="align-item-description"><?php echo $row["item_description"];?></td>
                        <td class ="align-total-usage"><?php echo $row["total_usage"];?></td>
            </tr>
                    <?php
                       
                        }
                    ?>
                </div>
        </table>
    <script src="usage_logs.js"></script>
</body>
</html>