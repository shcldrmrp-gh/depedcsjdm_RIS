$(document).ready(function() {
    // Fetch the last series number from the server
    $.ajax({
        url: 'get_last_series_number.php', // Create this PHP file to fetch the last series number
        method: 'GET',
        success: function(response) {
            let lastSeriesNumber = parseInt(response);
            if (isNaN(lastSeriesNumber)) {
                lastSeriesNumber = 0; // If no data is available, start from 0
            }
            
            // Get the year and month from worldtimeapi
            $.ajax({
                url: 'https://worldtimeapi.org/api/ip',
                dataType: 'json',
                success: function(data) {
                    const onlineDate = new Date(data.utc_datetime);
                    const year = onlineDate.getUTCFullYear();
                    const month = (onlineDate.getUTCMonth() + 1).toString().padStart(2, '0');
                    
                    lastSeriesNumber++;
                   
                    // Format the series number
                    const formattedSeriesNumber = String(lastSeriesNumber).padStart(6, '0');
                    
                    // Combine the year, month, and series number
                    const risNoDate = year + '-' + month + '-' + formattedSeriesNumber;
                    
                    // Set the formatted date as the value of the input element
                    $(".risNoDate").val(risNoDate);
                },
                error: function(error) {
                    console.error('Error fetching online date:', error);
                }
            });
        },
        error: function() {
            console.error("Error fetching last series number.");
        }
    });
});