
// Function for Search Bar//
function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".scroll table");
    tr = table.querySelectorAll("tr"); // Get all table rows

    for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
        td = tr[i].querySelectorAll("td")[2]; // Column index 6 for Account Name
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
// Function for Search Bar END//

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




//Error message for Email that already Exist//
function validateForm() {
    var depedEmailInput = document.getElementsByName('deped_Email[]')[0].value.toLowerCase();
    var depedEmailOptions = document.getElementsByName('selected_email')[0].options;
    var depedEmailExists = false;
    
    
    for (var i = 0; i < depedEmailOptions.length; i++) {
        if (depedEmailOptions[i].value.toLowerCase() === depedEmailInput) {
            depedEmailExists = true;
            break;
        }   
    } 
        
    
    if (depedEmailExists) {
        showErrorMessage("Email Address is already exist.");
        return false; // Prevent form submission
    } 
    function showErrorMessage(message) {
        swal.fire({
            title: "OOPPSS!!",
            text: message,
            icon: "Error",
        });
        
    }
}
//Error message for Email that already Exist END//   


//Deped Email alert message(add_account)//
const depedEmailInput = document.getElementById("depedEmailInput");

    depedEmailInput.addEventListener("input", function () {
        const value = depedEmailInput.value;
        if (!value.match(/.+@deped\.gov\.ph$/)) {
            depedEmailInput.setCustomValidity("Please type the @deped.gov.ph");
        } else {
            depedEmailInput.setCustomValidity("");
        }
    });
//Deped Email alert message(add_account) END//

document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('accountTypeSelect');

    selectElement.addEventListener('click', function() {
        const placeholderOption = selectElement.querySelector('option[value=""]');
        placeholderOption.style.display = 'none';
    });
});





