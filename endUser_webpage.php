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
    
    <title>RIS Form</title>

</head>

<body>
    <div id="formContainer">
       <table id="forRIS1" border="1" width="950px">
            <form class="risFORM "action="" method="POST">
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
                            Division: City of San Jose del Monte
                        </div>
                        <div class="centerCode">
                            Responsibility Code: 
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
                            RIS No.: _______________
                        </div>
                    </th>
                </tr>

                <tr colspan="8">
                    <th colspan="4">Requisition</th>
                    <th colspan="2">Stock Available?</th>
                    <th colspan="2">Issuance</th>
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
                        <select class="item_description" name="item_description[]">
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
                        </select>
                    </th>
                    <th class="quantityInput">
                        <div class="quantityInput">
                            <input type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input class="" type="number" min="1" max="99" name="" id="">
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
                    <select class="item_description" name="item_description[]">
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
                    </select>
                  </th>
                  <th class="quantityInput">
                    <div class="quantityInput">
                        <input type="number" min="1" max="99" name="" id="">
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
                        <input class="purposeInput" type="text" name="" id="">
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
                            Lalaine T. Manguisi
                        </div>
                    </th>
                    <th class="accountName"colspan="1">
                      <div class="accountName">
                         <!-- AUTOMATIC NAME FILL-UP -->
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
                    <th class="formDate" colspan="2">
                        <div>
                            <!-- AUTOMATIC DATE FORMATTING (DEVICE-BASED DATE) -->
                            <script>
                                $(document).ready(function() {
                                    $(".formDate").text(getFormattedDate(new Date()));
                                });
                                function getFormattedDate(date) {
                                    const day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
                                    const month = (date.getMonth() + 1) < 10 ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1);
                                    const year = date.getFullYear();
                                    return `${month}/${day}/${year}`;
                                };
                            </script>
                        </div>
                    </th>
                    <th colspan="2"></th>
                    <th colspan="2"></th>
                    <th class="formDate" colspan="1">
                        <div>
                             <!-- AUTOMATIC DATE FORMATTING (DEVICE-BASED DATE) -->
                            <script>
                                $(document).ready(function() {
                                    $(".formDate").text(getFormattedDate(new Date()));
                                });
                                function getFormattedDate(date) {
                                    const day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
                                    const month = (date.getMonth() + 1) < 10 ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1);
                                    const year = date.getFullYear();
                                    return `${month}/${day}/${year}`;
                                };
                            </script>
                        </div>
                    </th>
                </tr>
            </form>
       </table>
       <br>
       <br>
       <br>
       <br>
    </div>
    
    <div class="endUserButtons">
        <div class="generatePDFplacement">
            <button id="generatePDF">
                GENERATE PDF
            </button>
        </div>
    
        <form action="logout.php">
            <button id="logoutButton">
                LOGOUT
            </button>
        </form>
    </div>
        
        
    <!-- AUTO FILL UP FOR STOCK NUMBER AND UNIT -->
    <script>
        $(document).ready(function() {
            $(".item_description").change(function() {
                var selectedRow = $(this).closest("tr");
                var stockNumberInput = selectedRow.find(".stock_number");
                var stockUnitInput = selectedRow.find(".stock_unit");
                var selectedItem = $(this).val();

                $.ajax({
                    url: "itemInventory.php",
                    type: "POST",
                    data: { item_description: selectedItem },
                    dataType: "json",
                    success: function(data) {
                        stockNumberInput.val(data.stockNumber);
                        stockUnitInput.val(data.stockUnit);
                    }
                });
            });
        });
    </script>

    <!-- AUTO INPUT FOR STOCK AVAILABILITY -->
    <script>
        $(document).ready(function () {
            function updateCheckSymbols(selectedRow, itemQuantity) {
                var yesInputCheck = selectedRow.find(".yesInputCheck");
                var noInputCheck = selectedRow.find(".noInputCheck");

                if (itemQuantity > 0) {
                    yesInputCheck.text("✓");
                    noInputCheck.text("");
                } else {
                    yesInputCheck.text("");
                    noInputCheck.text("✓");
                }
            }

            $(".item_description").change(function () {
                var selectedRow = $(this).closest("tr");
                var selectedItemOption = $(this).find("option:selected");
                var itemDescription = selectedItemOption.val();
                $.ajax({
                    type: "POST",
                    url: "fetch_item_quantity.php",
                    data: { item_description: itemDescription },
                    success: function (response) {
                        var itemQuantity = parseInt(response);
                        updateCheckSymbols(selectedRow, itemQuantity);
                    },
                    error: function () {
                        console.error("Failed to fetch item_quantity");
                    },
                });
            });
        });
    </script>

    <!-- GENERATE PDF FUNCTION -->
    <script>
        let form = document.querySelector("#formContainer");
        let btn = document.querySelector("#generatePDF");
        
        var opt = {
            margin:         [12, -20, -1000, 10],
            filename:       'ris-form.pdf',
            image:          { type: 'jpeg', quality: .95},
            html2canvas:  { scale: 2, allowMagnification: false, width: 1250, height: 2000},
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        };

        btn.addEventListener('click', () => {
            
            let clonedForm = $(form).clone();

            $(form).find('select').each(function(index, originalSelect) {
                let clonedSelect = $(clonedForm).find('select').eq(index);
                
                let selectedValue = $(originalSelect).val();
                
                $(clonedSelect).val(selectedValue);
            });

            $(form).append(clonedForm);

            html2pdf().set(opt).from(form).save().then(() => {
                window.location.reload();
            });
        });
    </script>

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