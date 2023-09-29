<?php
    session_start();
    require_once("queuing system_connection.php");
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="queuing system.css">
    <link rel="icon" type="png" href="logos/depedcsjdmlogo.png">
    <title>Queuing System</title>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <h1>Department of Education <br> Region III <br> SCHOOLS DIVISION OF SAN JOSE DEL MONTE </h1>
        <a href="usermanagement.php" class="backbtn">BACK</a>
    </header>
    <h2>QUEUING SYSTEM</h2>
    <form action="" method="post">
        <div class="scroll">
            <table id="table" border="1">
                <tr>
                    <div class="headrow">
                        <th class="table-number">No.</th>
                        <th class="table-name">Name</th>
                        <th class="table-button-release">Action</th>
                    </div>
                </tr>
                <div class="row2">
                    <?php
                        $sql = "SELECT accountName,  referenceCode FROM queue_logs";
                        $result = mysqli_query($con, $sql);
                        $rowNumber = 1;
                        $previousAccountName = null;
                        $previousreferenceCode = null;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $currentAccountName = $row["accountName"];
                            $currentreferenceCode = $row["referenceCode"];

                            if ($currentAccountName !== $previousAccountName || $currentreferenceCode !== $previousreferenceCode) {
                    ?>
                    <tr>
                        <td><?php echo $rowNumber; ?></td>
                        <td><?php echo $currentAccountName; ?></td>
                        <td>
                        <a href="queuing_release.php?referenceCode=<?php echo $currentreferenceCode; ?>" class="openRelease">Click to Open</a>
                        </td>
                
                    </tr>
                    <?php
                                $previousAccountName = $currentAccountName;
                                $previousreferenceCode = $currentreferenceCode;
                                $rowNumber++;
                            }
                        }
                    ?>
                </div>
            </table>
    </div>
    </form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
