// queuing_release.js
document.addEventListener("DOMContentLoaded", function() {
    const btnCancel = document.getElementById("btnCancel");

    if (btnCancel) {
        btnCancel.addEventListener("click", function(event) {
            event.preventDefault();
            
            // Get the reference code you want to delete
            const referenceCode = document.querySelector("tr[data-reference-code]").getAttribute("data-reference-code");
            
            // Ask for confirmation before proceeding with deletion
            const confirmation = confirm("Are you sure you want to cancel this request? This action cannot be undone.");
            
            if (confirmation) {
                // User confirmed, proceed with the deletion
                $.ajax({
                    type: "POST",
                    url: "queuing-delete_row.php",
                    data: { referenceCode: referenceCode },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            // Deletion successful, navigate to another page
                            alert("Data deleted successfully.");
                            window.location.href = 'queuing system.php';
                        } else {
                            // Deletion failed, show an error message
                            alert("Error: " + response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error
                        alert("AJAX Error: " + error);
                    }
                });
            } else {
                // User canceled the deletion, do nothing
            }
        });
    }
});
