<?php
    session_start();
    require_once("requestlogs_connection.php");
    $query = "select * from request_logs";
    $result = mysqli_query($con,$query);


?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="logo/depedlogo.png">
    <link rel="stylesheet" href="request_logs.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="table2excel.js"></script>
    <title>Request Logs Inventory</title>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <h1>DEPARTMENT OF EDUCATION <br> REGION III <br> SCHOOLS DIVISION OF SAN JOSE DEL MONTE </h1>
        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search Account Name...." oninput="searchTable()">
        </div>
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
    <h2>REQUEST LOGS</h2>
    
    
    
    <div class="scroll">
        <table id="table" border="1">
            <tr>
                <div class="headrow">
                    <th class="RIS-number">RIS No.</th>
                    <th class="account-name">Account Name</th>
                    <th class="user-office">User Office</th>
                    <th class="stock-no">Stock No.</th>
                    <th class="item-description">Item Description</th>
                    <th class="stock-unit">Stock Unit</th>
                    <th class="quantity-input">Quantity Input</th>
                    <th class="form-date">Form Date</th>
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <?php
                        $selectQuery = "SELECT * FROM request_logs";
                        $result = mysqli_query($con, $selectQuery);
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                        
                        <td class ="RISno"><?php echo $row["risNoDate"];?></td>
                        <td class ="align-account-name"><?php echo $row["accountName"];?></td>
                        <td class ="align-user-office"><?php echo $row["userOffice"];?></td>
                        <td class="align-stock-no"><?php echo $row["stock_number"];?></td>
                        <td class="align-item-description"><?php echo $row["item_description"];?></td>
                        <td class ="align-stock-unit"><?php echo $row["stock_unit"];?></td>
                        <td class="align-quantity-input"><?php echo $row["quantityInput"];?></td>
                        <td class="align-form-date"><?php echo $row["formDate"];?></td>
            </tr>
                    <?php
                       
                        }
                    ?>
                </div>
        </table>
    </div>


  

<script src="request_logs.js"></script>
</body>
</html>