//Add Popup animation//

let popup = document.getElementById("popup");

function openAdd(){
    popup.classList.add("open-popup");
    closeEdit();
}
function closeAdd(){
    popup.classList.remove("open-popup");
}
//Add Popup animation//




// Draggable Div Element for add inventory
const popup1 = document.querySelector(".popup");
const h2 = popup1.querySelector("h2");
let isDragging = false;
let initialX, initialY;

function onDragStart(e) {
    isDragging = true;
    initialX = e.clientX;
    initialY = e.clientY;
}

function onDrag(e) {
    if (!isDragging) return;

    const deltaX = e.clientX - initialX;
    const deltaY = e.clientY - initialY;
    initialX = e.clientX;
    initialY = e.clientY;

    let getStyle = window.getComputedStyle(popup1);
    let left = parseInt(getStyle.left);
    let top = parseInt(getStyle.top);

    const newLeft = left + deltaX;
    const newTop = top + deltaY;

    popup1.style.left = `${newLeft}px`;
    popup1.style.top = `${newTop}px`;
}

function onDragEnd() {
    isDragging = false;
}

h2.addEventListener("mousedown", onDragStart);
document.addEventListener("mousemove", onDrag);
document.addEventListener("mouseup", onDragEnd);
// Draggable Div Element END



//Edit Popup animation//
let popup2 = document.getElementById("popup2");

function openEdit(){
    popup2.classList.add("open-popup2");
    closeAdd();
}
function closeEdit(){
    popup2.classList.remove("open-popup2");
}
//Edit Popup animation//



// Draggable Div Element for edit inventory
const popupedit = document.querySelector(".popup2");
const edit = popupedit.querySelector("h2");
let isDragging1 = false;
let initialx, initialy;

function onDragStart1(e) {
    isDragging1 = true;
    initialx = e.clientX;
    initialy = e.clientY;
}

function onDrag1(e) {
    if (!isDragging1) return;

    const deltaX = e.clientX - initialx;
    const deltaY = e.clientY - initialy;
    initialx = e.clientX;
    initialy = e.clientY;

    let getStyle = window.getComputedStyle(popupedit);
    let left = parseInt(getStyle.left);
    let top = parseInt(getStyle.top);

    const newLeft = left + deltaX;
    const newTop = top + deltaY;

    popupedit.style.left = `${newLeft}px`;
    popupedit.style.top = `${newTop}px`;
}

function onDragEnd1() {
    isDragging1 = false;
}

edit.addEventListener("mousedown", onDragStart1);
document.addEventListener("mousemove", onDrag1);
document.addEventListener("mouseup", onDragEnd1);
// Draggable Div Element edit inventory END






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




