<?php
    session_start();
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

    <link rel="stylesheet" href="endUser_Webpage.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="icon" type="image/x-icon" href="logos/depedcsjdmlogo.png">
    
    <title>DepEd CSJDM Requisition and Issue Slip Form</title>

</head>

<body>
<header>
        <img src="pictures/deped logo.png" alt="">  
        <nav>
            <ul>
                <li><a href="changePasswordForm.php">CHANGE PASSWORD</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
            <br>
        </nav>
    </header>
    
    <h1>Department of Education <br> Region III <br> SCHOOLS DIVISION OF CITY OF SAN JOSE DEL MONTE</h1>

    <br>
    <br>
    <div id="formContainer">
        <form class="risFORM "action="insert_data.php" method="POST">
            <table id="forRIS1" border="1" width="950px">
                <input type="hidden" name="yearRequested" class="yearRequested">
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
                                <?php
                                    if (isset($_SESSION['centerCode'])) {
                                        echo $_SESSION['centerCode'];
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="userOffice">
                            Office: 
                            <div class="userOfficePHP">
                                <?php
                                    if (isset($_SESSION['userOffice'])) {
                                        echo $_SESSION['userOffice'];
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="risNo">
                            RIS No.:
                            <input type="text" name="risNoDate" class="risNoDate" readonly>
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
                
                <tr colspan="8">
                      <th colspan="1" height="18px" class="stock_number">
                          <input class="stock_number" name="stock_number[]" type="text" readonly>
                      </th>
                      <th colspan="1" class="stock_unit">
                          <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                      </th>  

                    <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                    <th class="yesInputCheck"></th>
                    <th class="noInputCheck"></th>
                    <th class="quantityInput"></th>
                    <th class="issuedRemarks"></th>
                </tr>
                
                <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number stockNumberInput" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr colspan="8">
                  <th colspan="1" height="18px" class="stock_number">
                      <input class="stock_number" name="stock_number[]" type="text" readonly>
                  </th>
                  <th colspan="1" class="stock_unit">
                      <input class="stock_unit" name="stock_unit[]" type="text" readonly>
                  </th>
                  <th>
                        <select class="item_description" name="item_description[]" onfocus='this.size=5;' onblur='this.size=1;' onchange='updateMaxQuantity();'>
                            <option value="noValue"></option>
                            <?php
                                include('getItemDescriptionFromDatabase.php');
                            ?>
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" max="" pattern="[0-9]*" min="1" name="quantity[]" class="quantityInputUser" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </th>
                  <th class="yesInputCheck"></th>
                  <th class="noInputCheck"></th>
                  <th class="quantityInput"></th>
                  <th class="issuedRemarks"></th>
              </tr>

              <tr height="100px">
                  <th class="purposeSection" colspan="8">
                      <div class="purposeTitle">
                          Purpose:
                      </div>
                      <div>
                        <input class="purposeInput" type="text" name="purpose" id="" required>
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
                             <!-- AUTOMATIC NAME FILL-UP -->
                            <?php
                                if (isset($_SESSION['accountName'])) {
                                    echo $_SESSION['accountName'];
                                }
                            ?>
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
                            <?php
                                    if (isset($_SESSION['accountName'])) {
                                        echo $_SESSION['accountName'];
                                    }
                            ?>
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
                            <?php
                                if (isset($_SESSION['userPosition'])) {
                                    echo $_SESSION['userPosition'];
                                }
                            ?>
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
                             <!-- AUTOMATIC POSITION FILL-UP -->
                            <?php
                                if (isset($_SESSION['userPosition'])) {
                                    echo $_SESSION['userPosition'];
                                }
                            ?>
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
                        <input type="text" class="formDate" name="formDate" readonly>
                        <!-- GET CURRENT FORMATTED DATE -->
                        <script type="text/javascript" src="getCurrentDate.js">
                            
                        </script>
                    </th>
                    <th colspan="2"></th>
                    <th colspan="2"></th>
                    <th colspan="1">
                        <div>
                        
                        </div>
                    </th>
                </tr>
            </table>
        </form>
       <br>
       <br>
       <br>
    </div>

    <div class="endUserButtons">
        <div class="submitButtonplacement">
            <button type="submit" onclick="sendDataToDatabase()" id="submitButton">
                SUBMIT
            </button>
        </div>
    </div>
        
    <!-- AUTO FILL UP FOR STOCK NUMBER AND UNIT -->
    <script type="text/javascript" src="getStuckNumberUnit.js"></script>

    <!-- AUTO INPUT FOR STOCK AVAILABILITY -->
    <script type="text/javascript" src="autoStockAvailabilityInput.js"></script>

    <!-- GENERATE PDF FUNCTION -->
    <script type="text/javascript" src="submit_updateQuantity.js"></script>

    <!-- AUTO UPDATE MAX QUANTITY -->
    <script type="text/javascript" src="autoUpdateMaxQuantity.js"></script>

    <!-- AUTO-LOGOUT FUNCTION -->
    <script type="text/javascript" src="autoLogoutFunction.js"></script>

    <!-- SEND DATA TO DATABASE -->
    <script type="text/javascript" src="sendDataToDatabase.js"></script>
</body>
</html>