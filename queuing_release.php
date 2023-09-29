<?php
session_start();
require_once("queuing_release_autofillup.php");



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="queuing_release.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="icon" type="image/x-icon" href="logos/depedcsjdmlogo.png">
    
    <title>DepEd CSJDM Requisition and Issue Slip Form</title>

</head>

<body>
<header>
        <img src="pictures/deped logo.png" alt="">  
        <a href="queuing system.php" class="backbtn">BACK</a>
        <h1>Department of Education <br> Region III <br> SCHOOLS DIVISION OF CITY OF SAN JOSE DEL MONTE</h1>
    </header>
    
    

    <br>
    <br>
    <div id="formContainer">
        <form class="risFORM "action="queuing-delete_row.php" method="POST">
            <table id="forRIS1" border="1" width="950px">
            <tr reference-data-code = "referenceCode">
                <input type="hidden" name="yearRequested" class="yearRequested" <?php echo $yearRequested; ?>>
                <script src="getCurrentYear.js"></script>

                <tr>
                    <div class="formHeader">
                        <th width="100px"colspan="8">
                            Division of City Schools
                            <br>
                            City of San Jose del Monte
                            <br>
                        <div class="entityDeped">
                            Entity Name: DepEd
                        </div>
                        <div class="fundCluster">
                            Fund Cluster: 01101101
                        </div>
                        </th>
                    </div>
                </tr>

                <tr>
                    <th colspan="8">
                        <div class="cityDivision">
                            Division:
                        </div>
                        <div class="locationDivision">
                            City of San Jose del Monte
                        </div>
                        <div class="centerCode">
                            Responsibility Code: 
                        </div>
                            <div class="centerCodePHP">
                                <?php echo $centerCode; ?>
                            </div>
                        </div>
                        <div class="userOffice">
                            Office: 
                            <div class="userOfficePHP">
                                <?php echo $userOffice; ?>
                            </div>
                        </div>
                        <div class="risNo">
                            RIS No.:
                            <input type="text" name="risNoDate" class="risNoDate" readonly>
                            <script src="getrisNoDate.js"></script>
                        </div>
                    </th>
                </tr>

                <tr colspan="8">
                    <th colspan="4"><i>Requisition</i></th>
                    <th colspan="2"><i>Stock Available?<i></th>
                    <th colspan="2"><i>Issuance<i></th>
                </tr>

                <tr colspan="8">
                    <th class="stock_number">Stock No.</th>
                    <th class="stock_unit">Unit</th>
                    <th class="itemDescription_title">Item Description</th>
                    <th class="quantityInput">Quantity</th>
                    <th class="yesInputCheck">Yes</th>
                    <th class="noInputCheck">No</th>
                    <th class="quantityInput">Quantity</th>
                    <th class="issuedRemarks">Remarks</th>
                </tr>
                

                <!---------FOR EACH --------->
            
                <?php
                    $rowCount = count($data);
                    $maxRows = 10; // Define the maximum number of rows you want to display
                    

                    // Loop to create 10 rows and display data independently
                    for ($i = 0; $i < $maxRows; $i++) {
                        echo "<tr colspan='8'>";
                        if ($i < $rowCount) {
                            // If there is data available, populate the cells
                            echo "<tr data-reference-code='$referenceCode'>";
                            $stock_number = $data[$i]['stock_number'];
                            $stock_unit = $data[$i]['stock_unit'];
                            $item_description = $data[$i]['item_description'];
                            $quantityInput = $data[$i]['quantityInput'];
                            $yearRequested = $data[$i]['yearRequested'];
                            echo "<th colspan='1' height='18px' class='stock-number'>$stock_number</th>";
                            echo "<th colspan='1' class='stock-unit'>$stock_unit</th>";
                            echo "<th colspan='1' class='item-description'>$item_description</th>";
                            echo "<th colspan='1' class='quantity-Input'>$quantityInput</th>";
                            
                        } else {
                            // If there is no data, create empty cells
                            echo "<th colspan='1' height='18px' class='stock_number'></th>";
                            echo "<th colspan='1' class='stock_unit'></th>";
                            echo "<th></th>";
                            echo "<th class='quantityInput'></th>";
                        }
                            echo "<th class='yesInputCheck'></th>";
                            echo "<th class='noInputCheck'></th>";
                            echo "<th class='quantityInput'></th>";
                            echo "<th class='issuedRemarks'></th>";
                            echo "</tr>";
                    }
                ?>

                <!---------FOR EACH END--------->
                 
            
                    
                    
                    
                

                <tr height="100px">
                    <th class="purposeSection" colspan="8">
                        <div class="purposeTitle">
                            Purpose:
                        </div>
                        <div>
                            <input class="purposeInput" type="text" name="purpose" id="" readonly value=" <?php echo $purpose; ?>">
                        </div>
                    </th>
                </tr>

                <tr>
                    <th colspan="1" height="50px">
                        <div id="signature">
                            Signature
                        </div>
                    </th>
                    <th class="requestedBy" colspan="2">
                        <div class="requestedBy">
                            Requested by:
                        </div?>
                    </th>

                    <th colspan="2">
                        <div class="approvalDiv">
                            Approved by:
                        </div>
                    </th>
                    <th colspan="2">
                        <div class="approvalDiv">
                            Issued by:</th>
                        </div>
                    </th>
                    <th colspan="1">
                        <div class="approvalDiv">
                            Received by: 
                        </div>
                    </th>
                </tr>

                <tr height="20px">
                    <th colspan="1" class="firstcolumn_Approval">
                        <div class="firstcolumn_Approval">
                            Printed Name
                        </div>
                    </th>
                    <th class="accountName" colspan="2">
                        <div class="accountName">
                            <?php echo $accountName; ?>
                        </div>
                    </th>
                    <th class="approvedByName" colspan="2">
                        <div class="approvedByName">
                            Ma. Theresa M. Roxas
                        </div>
                    </th>
                    <th class="issuedByName" colspan="2">
                        <div class="issuedByName">
                            Mary Lalaine <br> Rachel T. Manguisi
                        </div>
                    </th>
                    <th class="accountName"colspan="1">
                      <div class="accountName">
                        <?php echo $accountName; ?>
                      </div>
                    </th>
                </tr>

                <tr>
                    <th colspan="1">
                        <div id="designationID">
                            Designation
                        </div>
                    </th>
                    <th colspan="2">
                        <div class="userPosition">
                            <?php echo $userPosition; ?>
                        </div>
                    </th>
                    <th colspan="2">
                        <div id="approverPosition">
                            AO IV (Supply)
                        </div>
                    </th>
                    <th colspan="2">
                        <div id="issuerPosition">
                            AA I
                        </div>
                    </th>
                    <th colspan="1">
                        <div class="userPosition">
                            <?php echo $userPosition; ?>
                        </div>
                    </th>
                </tr>

                <tr>
                    <th colspan="1">
                        <div id="dateToday">
                            Date
                        </div>    
                    </th>
                    <th colspan="2">
                        <input type="text" class="formDate" name="formDate" readonly value="<?php echo $dateRequested; ?>">
                    </th>
                    <th colspan="2"></th>
                    <th colspan="2"></th>
                    <th colspan="1">
                        <div>
                        
                        </div>
                    </th>
                </tr>
            </tr>
            </table>
            
        </form>
       <br>
       <br>
       <br>
    </div>

    <button type="submit" class="btnCancel" name="btnCancel" id="btnCancel" onclick="cancelRequest(this)">CANCEL</button>
    <button type="submit" class="btnRelease" name="btnRelease" id="btnRelease">RELEASE</button>




        
  
    <!-- GENERATE PDF FUNCTION -->
    <script src="generate_pdf.js"></script>

    <!-- SEND DATA TO DATABASE -->
    <script type="text/javascript" src="sendDataToDatabase.js"></script>
    <script src="queuing_release.js"></script>
</body>
</html>