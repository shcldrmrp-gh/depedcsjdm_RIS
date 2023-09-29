document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector("#formContainer");
    let btn = document.querySelector("#btnRelease");

    var opt = {
        margin: [-30, -40, 0, -100],
        filename: 'ris-form.pdf',
        image: { type: 'jpeg', quality: .95 },
        html2canvas: { scale: 2, allowMagnification: false, width: 1850, height: 1720 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
    };

    btn.addEventListener('click', () => {
        // Clone the form element and append it to the body
        let clonedForm = form.cloneNode(true); // Clone with deep copy
        document.body.appendChild(clonedForm);

        // Use html2pdf to save the cloned form as PDF
        html2pdf().set(opt).from(clonedForm).save().then(() => {
            // Remove the cloned form from the body
            document.body.removeChild(clonedForm);

            // Redirect to queuing system.php after PDF generation
            window.location.href = "queuing system.php";
        });
    });
});
