let form = document.querySelector("#formContainer");
        let btn = document.querySelector("#generatePDF");
        
        var opt = {
            margin:         [10, -20, -1000, 10],
            filename:       'ris-form.pdf',
            image:          { type: 'jpeg', quality: .95},
            html2canvas:  { scale: 2, allowMagnification: false, width: 1250, height: 2000},
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        };

        btn.addEventListener('click', () => {
            
            let clonedForm = $(form).clone();

            $(form).find('select').each(function(index, originalSelect) {
                let clonedSelect = $(clonedForm).find('select').eq(index);
                
                let selectedValue = $(originalSelect).val();
                
                $(clonedSelect).val(selectedValue);
            });

            $(form).append(clonedForm);

            let updateData = [];
            clonedForm.find('.item_description').each(function(index, selectElement) {
                let selectedItem = $(selectElement).val();
                let quantityInput = $(selectElement).closest('tr').find('.quantityInputUser').val();
                updateData.push({ item_description: selectedItem, quantity: quantityInput });
            });

            // Send AJAX request for each item to update the database
            updateData.forEach(function(data) {
                $.ajax({
                    url: "update_quantity.php",
                    type: "POST",
                    data: data,
                    success: function(response) {
                        console.log(response); // Log the response for debugging purposes
                    },
                    error: function() {
                        console.error("Error updating quantity");
                    },
                });
            });

            html2pdf().set(opt).from(form).save().then(() => {
                window.location.reload();
            });
        });