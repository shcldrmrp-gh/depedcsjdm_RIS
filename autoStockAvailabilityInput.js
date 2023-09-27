$(document).ready(function () {
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

    // Function to periodically update stock availability based on item quantity
    function periodicallyUpdateStockAvailability(selectedRow, itemDescription) {
        $.ajax({
            type: "POST",
            url: "fetch_item_quantity_2.php",
            data: { item_description: itemDescription },
            success: function (response) {
                var itemQuantity = parseInt(response);
                updateCheckSymbols(selectedRow, itemQuantity);
            },
            error: function () {
                console.error("Failed to fetch item_quantity");
            },
        });
    }

    $(".item_description").change(function () {
        var selectedRow = $(this).closest("tr");
        var selectedItemOption = $(this).find("option:selected");
        var itemDescription = selectedItemOption.val();
        
        if (itemDescription === "noValue") {
            // If "noValue" is selected, clear both "yesInputCheck" and "noInputCheck"
            selectedRow.find(".yesInputCheck").text("");
            selectedRow.find(".noInputCheck").text("");
        } else {
            // If not "noValue," update the stock availability and item quantity periodically
            periodicallyUpdateStockAvailability(selectedRow, itemDescription);
            // Set an interval to periodically update these elements (e.g., every 5 seconds)
            var intervalId = setInterval(function () {
                periodicallyUpdateStockAvailability(selectedRow, itemDescription);
            }, 3000); // Adjust the interval as needed (in milliseconds)
            // Store the interval ID so you can clear it when needed
            selectedRow.data('intervalId', intervalId);
        }
    });

    // Call the initial update for stock availability
    $(".item_description").each(function () {
        var selectedRow = $(this).closest("tr");
        var selectedItemOption = $(this).find("option:selected");
        var itemDescription = selectedItemOption.val();

        if (itemDescription !== "noValue") {
            periodicallyUpdateStockAvailability(selectedRow, itemDescription);
            // Set an interval to periodically update these elements (e.g., every 5 seconds)
            var intervalId = setInterval(function () {
                periodicallyUpdateStockAvailability(selectedRow, itemDescription);
            }, 3000); // Adjust the interval as needed (in milliseconds)
            // Store the interval ID so you can clear it when needed
            selectedRow.data('intervalId', intervalId);
        }
    });

    // Function to clear the interval when the item_description changes to "noValue"
    function clearIntervalForRow(selectedRow) {
        var intervalId = selectedRow.data('intervalId');
        if (intervalId) {
            clearInterval(intervalId);
        }
    }

    // Clear the interval when the item_description changes to "noValue"
    $(".item_description").change(function () {
        var selectedRow = $(this).closest("tr");
        var selectedItemOption = $(this).find("option:selected");
        var itemDescription = selectedItemOption.val();

        if (itemDescription === "noValue") {
            // Clear the interval for this row
            clearIntervalForRow(selectedRow);
        }
    });
});
