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

// Initialize available options
const selects = document.querySelectorAll('.item-description-select');
selects.forEach((select) => {
    updateAvailableOptions(select);
});