// Add an event listener to the form submission
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.risFORM');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Validate the form
        const isValid = validateForm(form);

        if (isValid) {
            // If the form is valid, display a SweetAlert for successful submission
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your request is now submitted for queueing',
                confirmButtonText: 'OK'
            }).then(() => {
                // After the user clicks OK, you can submit the form programmatically
                form.submit();
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
                icon: 'error',
                title: 'Validation Error',
                text: 'Please enter a quantity for the selected item.',
            });
            break; // Stop checking further items
        }
    }

    // Return whether the form is valid or not
    return isValid;
}