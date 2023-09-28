// Function to update available options
function updateAvailableOptions(selectElement) {
    const selectedDescriptions = new Set();
    const selects = document.querySelectorAll('.item-description-select');

    selects.forEach((select) => {
        const selectedOption = select.querySelector('option:checked');
        const selectedValue = selectedOption.value;

        if (selectedValue !== 'noValue') {
            selectedDescriptions.add(selectedValue);
        }
    });

    selects.forEach((select) => {
        const options = select.querySelectorAll('option');
        options.forEach((option) => {
            if (option.value !== 'noValue') {
                if (selectedDescriptions.has(option.value)) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            }
        });
    });
}

// Event delegation to handle select change
document.body.addEventListener('change', (event) => {
    if (event.target.classList.contains('item-description-select')) {
        updateAvailableOptions(event.target);
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.risFORM');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Validate the form
        const isValid = validateForm(form);

        if (isValid) {
            // Make an AJAX request to insert_data.php
            fetch('insert_data.php', {
                method: 'POST',
                body: new FormData(form),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // If data was inserted successfully, display the SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'REQUEST SUBMITTED!',
                        text: 'Your request is now submitted to Property and Supply unit for queueing.',
                        confirmButtonText: 'OK',
                        showConfirmButton: true // Show the OK button
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                } else {
                    // If there was an error, display an error message in SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
});

function validateForm(form) {
    const itemDescriptions = form.querySelectorAll('.item_description');
    const quantityInputs = form.querySelectorAll('.quantityInputUser');
    let isValid = true;

    for (let i = 0; i < itemDescriptions.length; i++) {
        const itemDescription = itemDescriptions[i];
        const quantityInput = quantityInputs[i];

        // Check if an item_description is selected and the quantityInput is empty
        if (itemDescription.value !== 'noValue' && quantityInput.value === '') {
            isValid = false;
            // Display a SweetAlert for validation error
            Swal.fire({
                icon: 'question',
                title: 'NO QUANTITY FOUND!',
                text: 'Please enter a quantity for the selected item.',
            });
            break; // Stop checking further items
        }
    }

    // Return whether the form is valid or not
    return isValid;
}

// Initialize available options
const selects = document.querySelectorAll('.item-description-select');
selects.forEach((select) => {
    updateAvailableOptions(select);
});