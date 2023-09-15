
function searchTable() {
    var input, filter, table, tr, td1, td2, td3, td4, td5, td6, i, txtValue1, txtValue2, txtValue3, txtValue4, txtValue5, txtValue6;
    input = document.getElementById("searchInput");
    filter = input.value.toLowerCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[0]; // RIS No. column
        td2 = tr[i].getElementsByTagName("td")[1]; // Account Name column
        td3 = tr[i].getElementsByTagName("td")[2]; // User Office
        td4 = tr[i].getElementsByTagName("td")[3]; // stock number
        td5 = tr[i].getElementsByTagName("td")[4]; // item description
        td6 = tr[i].getElementsByTagName("td")[7]; // form date
    

        if (td1 && td2 && td3 && td4 && td5 && td6) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            txtValue3 = td3.textContent || td3.innerText;
            txtValue4 = td4.textContent || td4.innerText;
            txtValue5 = td5.textContent || td5.innerText;
            txtValue6 = td6.textContent || td6.innerText;

        if (txtValue1.toLowerCase().indexOf(filter) > -1 || txtValue2.toLowerCase().indexOf(filter) > -1 || txtValue3.toLowerCase().indexOf(filter) > -1 || txtValue4.toLowerCase().indexOf(filter) > -1 || txtValue5.toLowerCase().indexOf(filter) > -1 || txtValue6.toLowerCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    
}