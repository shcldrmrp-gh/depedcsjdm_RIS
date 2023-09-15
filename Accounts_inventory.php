<?php
    session_start();

    require_once("add_accounts&connection_table.php");
    $query = "select * from inventory";
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts Information Page</title>
    <link rel="website icon" type="png" href="logo/depedlogo.png">
    <link rel="stylesheet" href="Accounts_inventory.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <h1>DEPARTMENT OF EDUCATION <br> REGION III <br> SCHOOLS DIVISION OF SAN JOSE DEL MONTE </h1>
        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search Account Name...." oninput="searchTable()">
        </div>
        
        <nav>
            <ul>
                <li>
                    <a href="#">UPDATE</a>
                    <ul class="dropdown">
                        <li><a href="#" onclick="openAdd()">Add Account</a></li>
                        <li><a href="#" onclick="openEdit()">Edit Account</a></li>
                        <li><a href="#" onclick="openDelete()">Delete Account</a></li>
                    </ul>
                </li>
            </ul>
        </nav>


    
    </header>
    <h2>USER ACCOUNTS</h2>
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
    
  
    <div class="scroll">
        <table>
            <tr>
                <div class="headrow">
                    <th class="table-number">No.</th>
                    <th class="account-type">Account Type</th>
                    <th class="account-name">Account Name</th>
                    <th class="user-position">User Position</th>
                    <th class="user-office">User Office</th>
                    <th class="center-code">Center Code</th>
                    <th class="deped-email">Deped Email</th>
                    <th class="account-pass">Account Pass</th>
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <?php
                        $selectQuery = "SELECT * FROM ris_accounts";
                        $result = mysqli_query($con, $selectQuery);
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                        <td class="tableNo"><?php echo $rowNumber;?></td>
                        <td class ="align-account-type"><?php echo $row["accountType"];?></td>
                        <td class="align-account-name"><?php echo $row["accountName"];?></td>
                        <td class="align-userposition"><?php echo $row["userPosition"];?></td>
                        <td class ="align-useroffice"><?php echo $row["userOffice"];?></td>
                        <td class="centerCode"><?php echo $row["centerCode"];?></td>
                        <td class="align-depedemail"><?php echo $row["depedEmail"];?></td>
                        <td class="accountPass">*******</td>

            </tr>
                    <?php
                        $rowNumber++;
                        }
                    ?>
                </div>
        </table>
    </div>
    <!-----Add Propmpt------->
    <div class="popup" id="popup">
        <form class="insert_form" id="insert_form" method="post" action="" onsubmit="return validateForm();">

            <h2>ADD ACCOUNTS</h2> 
            <div class="accounttype">
                <label>Account Type:</label>
                <select name="account_Type[]" class="dropdownaccountType" id="accountTypeSelect"> 
                    <option value="">Select Account Type</option>
                    <option value="End User">End User</option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="User Manager">User Manager</option>
                </select>
            </div>
            <div class="accountname">
                <label>Account Name:</label>
                <input type="text" name="account_Name[]" required><br>
            </div>
            <div class="userposition">
                <label>User Position:</label>
                <input type="text" name="user_Position[]" required><br>
            </div>
            <div class="useroffice">
                <label>User Office:</label>
                <input type="text" name="user_Office[]" required>
            </div>
            <div class="centercode">
                <label>Center Code:</label>
                <input type="text" name="center_Code[]" required>
            </div>
            <div class="depedemail">
                <label>Deped Email:</label>
                <input type="email" placeholder="example@deped.gov.ph" name="deped_Email[]" id="depedEmailInput" required pattern=".+@deped\.gov\.ph$">
            </div>
            <script>
    
            </script>
            <div class="accountpass">
                <label>Account Pass:</label>
                <input type="text" name="account_Pass[]" required>
            </div>

            <div class="buttons">
                <input class="Register" type="submit" name="register" id="register" value="Register">
                <button type="button" class="Close" onclick="closeAdd()">Close</button>    
            </div>
        
        </form> 
    </div>
    <!-----Add Propmpt END------->



    <!-----Edit Prompt------->              
    <div class="popup2" id="popup2">
        <form method="POST" action="edit_account.php">
            <h2>EDIT ACCOUNT</h2>
            <?php //To connect Dropdown to database
                $sql = "SELECT depedEmail FROM ris_accounts ORDER BY depedEmail ASC";
                $result = $con->query($sql);
            ?>
            <select name="selected_email" id="selectedEmail" class="dropdownedit"> 
                <?php //Dropdownlist
             
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['depedEmail'] . "'>" . $row['depedEmail'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
            
                ?>
            </select>

            <div class="User_Office">
                <label>User Office:</label>
                <input type="text" name="useroffice" id="userOffice">
            </div>
            <div class="User_Position">
                <label>User Position:</label>
                <input type="text" name="userposition" id="userPosition">
            </div>
            <div class="Center_Code">
                <label>Center Code:</label>
                <input type="text" name="centercode" id="centerCode">
            </div>
            <div class="buttons2">
                <button type="submit" class="Save2">Save</button>
                <button type="button" class="Close2" onclick="closeEdit()">Close</button>
            </div>
        </form>
    </div>

    <!-----Edit Prompt------->



    <!-----Delete Prompt------->
    <div class="popup3" id="popup3">
        <form method="POST" action="delete_account.php">
            <h2>DELETE INVENTORY</h2>
            <?php //To connect Dropdownlist to database
                $sql = "SELECT depedEmail FROM ris_accounts ORDER BY depedEmail ASC";
                $result = $con->query($sql);
                ?>

                <select name="selected_item_delete" class="dropdowndelete"> 
                    <?php //Dropdownlist Delete
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['depedEmail'] . "'>" . $row['depedEmail'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
                    ?>
                </select>
                <div class="buttons3">
                    <button type="submit" class="Delete" name="delete_account">DELETE</button>
                    <button type="button" class="Close3" onclick="closeDelete()">Close</button>
                </div>
        </form>   
    </div>
    <!-----Delete Prompt------->

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Accounts_inventory.js"></script>
</body>
</html>