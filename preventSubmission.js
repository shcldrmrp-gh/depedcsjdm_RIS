function validateForm(form) {
    const itemDescriptions = form.querySelectorAll('.item_description');
    const quantityInputs = form.querySelectorAll('.quantityInputUser');

    for (let i = 0; i < itemDescriptions.length; i++) {
        const itemDescription = itemDescriptions[i];
        const quantityInput = quantityInputs[i];

        // Check if an item_description is selected and the quantityInput is empty
        if (itemDescription.value !== 'noValue' && quantityInput.value === '') {
            alert('Please enter a quantity for the selected item.');
            return false; // Prevent form submission
        }
    }

    // If all checks pass, allow form submission
    return true;
}