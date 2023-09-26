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

    $(".item_description").change(function () {
        var selectedRow = $(this).closest("tr");
        var selectedItemOption = $(this).find("option:selected");
        var itemDescription = selectedItemOption.val();
        
        if (itemDescription === "noValue") {
            // If "noValue" is selected, clear both "yesInputCheck" and "noInputCheck"
            selectedRow.find(".yesInputCheck").text("");
            selectedRow.find(".noInputCheck").text("");
        } else {
            // If not "noValue," make the AJAX request to fetch item_quantity
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
    });
});
