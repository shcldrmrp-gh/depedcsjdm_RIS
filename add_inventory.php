<?php

$con = mysqli_connect("localhost", "root", "root", "ris_propertyoffice");

if (isset($_POST['save'])) {
    $stock_number = $_POST['stock_number'];
    $stock_unit = $_POST['stock_unit'];
    $item_description = $_POST['item_description'];
    $item_quantity = $_POST['item_quantity'];

    foreach ($stock_number as $key => $value) {
        $existingStockNumQuery = "SELECT COUNT(*) FROM inventory WHERE stock_number = '" . mysqli_real_escape_string($con, $value) . "'";
        $existingStockNumResult = mysqli_query($con, $existingStockNumQuery);
        $stockNumCount = mysqli_fetch_array($existingStockNumResult)[0];

        if ($stockNumCount == 0) {
            $existingItemDescriptionQuery = "SELECT COUNT(*) FROM inventory WHERE item_description = '" . mysqli_real_escape_string($con, $item_description[$key]) . "'";
            $existingItemDescriptionResult = mysqli_query($con, $existingItemDescriptionQuery);
            $itemDescriptionCount = mysqli_fetch_array($existingItemDescriptionResult)[0];

            if ($itemDescriptionCount == 0) {
                $insertQuery = "INSERT INTO inventory (stock_number, stock_unit, item_description, item_quantity) VALUES (
                    '" . mysqli_real_escape_string($con, $value) . "','" . mysqli_real_escape_string($con, $stock_unit[$key]) . "','" . mysqli_real_escape_string($con, $item_description[$key]) . "','" . mysqli_real_escape_string($con, $item_quantity[$key]) . "')";
                $query = mysqli_query($con, $insertQuery);
                
            }
        }
       
    }

    mysqli_close($con);
    header("Location: usermanagement.php");
}
?>
