function deleteRow(button) {
    // Get the referenceCode from the data attribute of the parent row
    var referenceCode = button.parentElement.parentElement.getAttribute("data-reference-code");

    // Confirm with the user before deleting
    if (confirm("Are you sure you want to delete the request?")) {
        // Send an AJAX request to the server to delete the record
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "queuing-delete_row.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Remove the row from the table on success
                var row = button.parentElement.parentElement;
                row.parentNode.removeChild(row);
            }
        };
        xhr.send("referenceCode=" + referenceCode);
    }
}

function openForm(button) {
    const accountName = button.getAttribute('data-account-name');
    const referenceCode = button.getAttribute('data-reference-code');

    // Create a URL with query parameters to pass data to the second code.
    const url = `queuing_release.php?accountName=${encodeURIComponent(accountName)}&referenceCode=${encodeURIComponent(referenceCode)}`;

    // Open the second code in a new window or tab.
    window.open(url, '_blank'); 
}