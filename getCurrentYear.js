async function getCurrentYear() {
    try {
        const response = await fetch('http://worldtimeapi.org/api/ip');
        const data = await response.json();
        if (data && data.datetime) {
            const datetime = new Date(data.datetime);
            const currentYear = datetime.getFullYear();
            
            // Set the current year in the input field
            const yearInput = document.querySelector('.yearRequested');
            yearInput.value = currentYear;
        } else {
            console.error('Failed to fetch year data from World Time API.');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

getCurrentYear();