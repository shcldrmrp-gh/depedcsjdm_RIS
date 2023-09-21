// Function for searchbar
function searchTable() {
    var input, filter, table, tr, td1, td2, i, txtValue1, txtValue2;
    input = document.getElementById("searchInput");
    filter = input.value.toLowerCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[1]; // Stock No. column
        td2 = tr[i].getElementsByTagName("td")[3]; // Item Description column

    if (td1 && td2) {
        txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;

        if (txtValue1.toLowerCase().indexOf(filter) > -1 || txtValue2.toLowerCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
            
    }
}
// Function for searchbar END



// Convert into Excel all data in table in database
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'Item Inventory.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
// Convert into Excel all data in table in database END

//Delete Popup animation//
let popup3 = document.getElementById("popup3");

function openDelete(){
    popup3.classList.add("open-popup3");
}
function closeDelete(){
    popup3.classList.remove("open-popup3");
}
//Delete Popup animation END//


// Function for sorting
function sortTable() {
    var table = document.getElementById("table");
    var rows = table.rows;
    var sortOption = document.getElementById("sort_option").value;

    // Convert rows to an array for sorting
    var rowsArray = Array.from(rows).slice(1); // Exclude the header row

    // Sort the array based on the selected option
    if (sortOption === "low-high") {
        rowsArray.sort(function (a, b) {
            var quantityA = parseInt(a.cells[4].textContent);
            var quantityB = parseInt(b.cells[4].textContent);
            return quantityA - quantityB;
        });
    } else if (sortOption === "high-low") {
        rowsArray.sort(function (a, b) {
            var quantityA = parseInt(a.cells[4].textContent);
            var quantityB = parseInt(b.cells[4].textContent);
            return quantityB - quantityA;
        });
    } else {
        // Revert to the original order (by row number)
        rowsArray.sort(function (a, b) {
            var rowNumberA = parseInt(a.cells[0].textContent);
            var rowNumberB = parseInt(b.cells[0].textContent);
            return rowNumberA - rowNumberB;
        });
    }

    // Reinsert sorted rows into the table
    for (var i = 0; i < rowsArray.length; i++) {
        table.appendChild(rowsArray[i]);
    }
}

    
