$(document).ready(function () {
    // Create an object to store the previous item quantities for selected items
    var previousItemQuantities = {};

    function updateCheckSymbols(selectedRow, itemQuantity) {
        var yesInputCheck = selectedRow.find(".yesInputCheck");
        var noInputCheck = selectedRow.find(".noInputCheck");

        if (itemQuantity > 0) {
            yesInputCheck.text("✓");
            noInputCheck.text("");
        } else if (itemQuantity == 0) {
            yesInputCheck.text("");
            noInputCheck.text("✓");
        } else if (itemQuantity == -1) {
            yesInputCheck.text("");
            noInputCheck.text("");
        } 
    }

    function periodicallyUpdateStockAvailability() {
        $(".item_description").each(function () {
            var selectedRow = $(this).closest("tr");
            var selectedItemOption = $(this).find("option:selected");
            var itemDescription = selectedItemOption.val();

            if (itemDescription !== "noValue") {
                $.ajax({
                    type: "POST",
                    url: "fetch_item_quantity_2.php",
                    data: { item_description: itemDescription },
                    success: function (response) {
                        var itemQuantity = parseInt(response);

                        // Check if the current item quantity differs from the previous value
                        if (previousItemQuantities[itemDescription] !== itemQuantity) {
                            updateCheckSymbols(selectedRow, itemQuantity);
                        }

                        // Update the previous item quantity for the selected item
                        previousItemQuantities[itemDescription] = itemQuantity;
                    },
                    error: function () {
                        console.error("Failed to fetch item_quantity");
                    },
                });
            }
        });
    }

    // Call the function to start periodic updates
    periodicallyUpdateStockAvailability();

    // Set an interval to periodically update stock availability (every 1 second)
    setInterval(function () {
        periodicallyUpdateStockAvailability();
    }, 1000); // Adjust the interval as needed (in milliseconds)
});
