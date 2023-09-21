
//Add Popup animation//

let popup = document.getElementById("popup");

function openAdd(){
    popup.classList.add("open-popup");
}
function closeAdd(){
    popup.classList.remove("open-popup");
}
//Add Popup animation//




//Edit Popup animation//
let popup2 = document.getElementById("popup2");

function openEdit(){
    popup2.classList.add("open-popup2");
}
function closeEdit(){
    popup2.classList.remove("open-popup2");
}
//Edit Popup animation//




//Delete Popup animation//
let popup3 = document.getElementById("popup3");

function openDelete(){
    popup3.classList.add("open-popup3");
}
function closeDelete(){
    popup3.classList.remove("open-popup3");
}
//Delete Popup animation//


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




