<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "ris_propertyoffice";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "SELECT item_description FROM inventory ORDER BY item_description ASC";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['item_description'] . '">' . $row['item_description'] . '</option>';
    }

    $conn->close();
?>