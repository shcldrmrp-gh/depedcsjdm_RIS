$insert_sql = "SELECT item_description FROM inventory WHERE stock_number = '$stock_number'";
    $insert_result = mysqli_query($con, $insert_sql);

    if ($insert_result) {
        $insert_row = mysqli_fetch_assoc($insert_result);
        $item_description = $insert_row["item_description"];

            $insertSql = "INSERT INTO usermanager_logs VALUES ('$accountName', '$stock_number','$item_description', '$addQuantity', '$formDate')";
            if (mysqli_query($con, $insertSql)) {
            }    
        } 
    } 

    $sql = "SELECT item_quantity FROM inventory WHERE stock_number = '$stock_number'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentQuantity = $row["item_quantity"];

        // Calculate the new quantity
        $newQuantity = $currentQuantity + $addQuantity;

        // Update the quantity in the database
        $updateSql = "UPDATE inventory SET item_quantity = $newQuantity WHERE stock_number = '$stock_number'";
        if (mysqli_query($con, $updateSql)) {    
        
        
        } 

        // queuing_release.js
document.addEventListener("DOMContentLoaded", function() {
    const btnCancel = document.getElementById("btnCancel");

    if (btnCancel) {
        btnCancel.addEventListener("click", function(event) {
            event.preventDefault();
            
            // Get the reference code you want to delete
            const referenceCode = document.querySelector("tr[data-reference-code]").getAttribute("data-reference-code");
            
            // Use SweetAlert for confirmation
            Swal.fire({
                title: "Are you sure?",
                text: "The request will delete permanently.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#162fa0",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, cancel it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with the deletion
                    $.ajax({
                        type: "POST",
                        url: "queuing-delete_row.php",
                        data: { referenceCode: referenceCode },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                // Deletion successful, show success SweetAlert
                                Swal.fire("Deleted!", "Request has been canceled.", "success").then(() => {
                                    // Navigate to another page
                                    window.location.href = 'queuing system.php';
                                });
                            } else {
                                // Deletion failed, show an error SweetAlert
                                Swal.fire("Error", "Error deleting request: " + response.error, "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle AJAX error and show an error SweetAlert
                            Swal.fire("Error", "AJAX Error: " + error, "error");
                        }
                    });
                }
            });
        });
    }
});

        