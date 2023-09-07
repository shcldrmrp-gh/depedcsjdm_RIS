<?php
    session_start();

    require_once("add_inventory.php");
    $query = "select * from inventory";
    $result = mysqli_query($con,$query);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DepEd CSJDM Property Office Item Inventory</title>
    <link rel="icon" type="image/x-icon" href="logos/depedcsjdmlogo.png">
    <link rel="stylesheet" href="usermanagementstyle.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        });
        


        // Alert for stock number and item description
        function showAlert(message) {
            alert(message);
        }

        
        function validateForm() {
            var ItemInput = document.getElementsByName('item_description[]')[0].value.toLowerCase();
            var StockInput = document.getElementsByName('stock_number[]')[0].value.toLowerCase();
            var ItemOptions = document.getElementsByName('item')[0].options;
            var StockOptions = document.getElementsByName('selected_item')[0].options;
            
            for (var i = 0; i < ItemOptions.length; i++) {
                if (ItemOptions[i].value.toLowerCase() === ItemInput) {
                    showAlert("This Item Description is already exist! Please input another Item Description.");
                    return false; // Prevent form submission
                    }   
                } 
                
                for (var i = 0; i < StockOptions.length; i++){
                    if (StockOptions[i].value.toLowerCase() === StockInput) {
                        showAlert("This Stock Number is already exist! Please input another Stock Number.");
                        return false;

                    }
                }
            
                return true; // Allow form submission
            }
            

            // Search bar funtion
            function searchTable() {
                var input, filter, table, tr, td1, td2, i, txtValue1, txtValue2;
                input = document.getElementById("searchInput");
                filter = input.value.toLowerCase();
                table = document.querySelector("table");
                tr = table.getElementsByTagName("tr");

             for (i = 0; i < tr.length; i++) {
                td1 = tr[i].getElementsByTagName("td")[0]; // Stock No. column
                td2 = tr[i].getElementsByTagName("td")[2]; // Item Description column

                if (td1 && td2) {
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;

                if (txtValue1.toLowerCase().indexOf(filter) > -1 || txtValue2.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
</head>
<body>

    <header>
        <img src="pictures/deped logo.png" alt="">
        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search Item Description...." oninput="searchTable()">
             
        </div>
        
        <nav>
            <ul>
                <li>
                    <a href="#">UPDATE</a>
                    <ul class="dropdown">
                        <li><a href="#" onclick="openAdd()">Add</a></li>
                        <li><a href="#" onclick="openEdit()">Edit</a></li>
                        <li><a href="#" onclick="openDelete()">Delete</a></li>
                        
                    </ul>
                </li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <h1>ITEM INVENTORY</h1>


    <div class="scroll">
    <table>
        <tr>
            <div class="headrow">
                <th>Stock No.</th>
                <th>Unit</th>
                <th>Item Description</th>
                <th>Quantity Left</th>
            </div>
        </tr>
        <tr>
            <div class="row2">
                <?php
                    $sql = "SELECT * FROM inventory ORDER BY item_description ASC";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                ?>
                    <td><?php echo $row["stock_number"];?></td>
                    <td><?php echo $row["stock_unit"];?></td>
                    <td><?php echo $row["item_description"];?></td>
                    <td><?php echo $row["item_quantity"];?></td>
                </tr>
                <?php
                    }
                ?>
            </div>      
    </table>
    </div>

    <!-----Add Propmpt------->
    <div class="popup" id="popup">
        <form class="insert_form" id="insert_form" method="post" action="" onsubmit="return validateForm();">
            <h2>ADD INVENTORY</h2> 
            <div class="Stock">
                <label>Stock No.:</label>
                <input type="text" name="stock_number[]" required><br>
            </div>
            <div class="Item">
                <label>Item Description:</label>
                <input type="text" name="item_description[]" required><br>
            </div>
            <div class="Unit">
                <label>Unit:</label>
                <input type="text" name="stock_unit[]" required><br>
            </div>
            <div class="Quantity">
                <label>Quantity:</label>
                <input type="text" name="item_quantity[]" required>
            </div>
            <div class="buttons">
                <input class="Save" type="submit" name="save" id="save" value="Save">
                <button type="button" class="Close" onclick="closeAdd()">Close</button>    
            </div>
        
        </form> 
    </div>
    <!-----Add Propmpt------->

    <!-----Edit Prompt------->
    <div class="popup2" id="popup2">
        <form method="POST" action="edit_inventory.php">
            <h2>EDIT INVENTORY</h2>
            <?php //To connect Dropdown to database
                $sql = "SELECT stock_number, item_description FROM inventory ORDER BY item_description ASC";
                $result = $con->query($sql);
            ?>
            <select name="selected_item" class="dropdownedit"> 
                <?php //Dropdownlist
             
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['stock_number'] . "'>" . $row['item_description'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
            
                ?>
            </select>

            <div class="Quantity2">
                <label for="addQuantity">Quantity:</label>
                <input type="text" name="add_quantity" id="addQuantity">
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
        <form method="POST" action="delete_inventory.php">
            <h2>DELETE INVENTORY</h2>
            <?php //To connect Dropdownlist to database
                $sql = "SELECT stock_number, item_description FROM inventory ORDER BY item_description ASC";
                $result = $con->query($sql);
                ?>

                <select name="item" class="dropdowndelete"> 
                    <?php //Dropdownlist Delete
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['item_description'] . "'>" . $row['item_description'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
                    ?>
                </select>
                <div class="buttons3">
                    <button type="submit" class="Delete" name="delete_item">DELETE</button>
                    <button type="button" class="Close3" onclick="closeDelete()">Close</button>
                </div>
        </form>   
    </div>
    <!-----Delete Prompt------->


    <script src="usermanagementscript.js"></script>
    
    <!-- DISABLED BACK BUTTON -->
    <script>
          history.pushState(null, null, location.href);
          window.onpopstate = function () {
              history.go(1);
          };
    </script>

    <!-- AUTO-LOGOUT FUNCTION -->
    <script>
        let inactivityTimeout;

        function resetInactivityTimer() {
            clearTimeout(inactivityTimeout);
            inactivityTimeout = setTimeout(logout, 60000);
        }

        document.addEventListener('mousemove', resetInactivityTimer);
        document.addEventListener('keydown', resetInactivityTimer);

        function logout() {
            window.location.href = 'logout.php';
        }

        resetInactivityTimer();
    </script>


</body>
</html>