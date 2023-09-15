$(document).ready(function() {
    $.ajax({
        url: 'https://worldtimeapi.org/api/ip',
        dataType: 'json',
        success: function(data) {
            const onlineDate = new Date(data.utc_datetime);
            document.querySelector('.formDate').value = getFormattedDate(onlineDate);
        },
        error: function(error) {
            console.error('Error fetching online date:', error);
        }
    });

    function getFormattedDate(date) {
        const day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
        const month = (date.getMonth() + 1) < 10 ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1);
        const year = date.getFullYear();
        return `${month}/${day}/${year}`;
    }
});
