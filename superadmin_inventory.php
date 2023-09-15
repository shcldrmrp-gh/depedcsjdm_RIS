<?php
    session_start();

    require_once("superadmin_connecttable.php");
    $query = "select * from inventory";
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPER ADMIN</title>
    <link rel="website icon" type="png" href="logo/depedlogo.png">
    <link rel="stylesheet" href="superadmin_inventory.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <h1>DEPARTMENT OF EDUCATION <br> REGION III <br> SCHOOLS DIVISION OF SAN JOSE DEL MONTE </h1>
        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search Item Description...." oninput="searchTable()">
        </div>    
    </header>
    <h2>ITEM INVENTORY</h2>
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
            <li><a href="logout.php"><i class='bx bx-exit'></i>Logout</a></li>
        </ol>
    </div>
    <section></section>
  
    <div class="scroll">
        <table>
            <tr>
                <div class="headrow">
                    <th class="table-number">No.</th>
                    <th class="table-stock">Stock No.</th>
                    <th class="table-unit">Unit</th>
                    <th class="table-item">Item Description</th>
                    <th class="table-quantity">Quantity</th>
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <?php
                        $sql = "SELECT * FROM inventory ORDER BY item_description ASC";
                        $result = mysqli_query($con, $sql);
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                        <td><?php echo $rowNumber;?></td>
                        <td><?php echo $row["stock_number"];?></td>
                        <td><?php echo $row["stock_unit"];?></td>
                        <td class="align-item-description"><?php echo $row["item_description"];?></td>
                        <td><?php echo $row["item_quantity"];?></td>
            </tr>
                    <?php
                        $rowNumber++;
                        }
                    ?>
                </div>
        </table>
    </div>
    <script src="superadmin_inventory.js"></script>
</body>
</html>