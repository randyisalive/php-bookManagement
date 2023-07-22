<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add custom CSS for editable fields -->
    <style>
    .editable {
        cursor: pointer;
        border-bottom: 1px dashed #007bff;
    }

    .editable input,
    .editable textarea {
        border: none;
        background-color: transparent;
        resize: none;
        outline: none;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Book Cover -->
                <img src="path/to/book-cover.jpg" class="img-fluid rounded" alt="Book Cover">
            </div>
            <div class="col-md-8">
                <!-- Book Details -->
                <h2 class="editable" onclick="enableEditing('bookTitle')">Book Title</h2>
                <p><strong>Category:</strong> <span class="editable"
                        onclick="enableEditing('bookCategory')">Fiction</span></p>
                <p><strong>Description:</strong> <span class="editable" onclick="enableEditing('bookDescription')">Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit.</span></p>
                <p><strong>Quantity:</strong> <span class="editable" onclick="enableEditing('bookQuantity')">10</span>
                </p>
                <!-- Add more book details as needed -->
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional, for certain Bootstrap features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function enableEditing(fieldId) {
        const fieldElement = document.getElementById(fieldId);
        const fieldValue = fieldElement.innerText;

        // Create an input or textarea element with the current field value
        const inputElement = document.createElement('input');
        inputElement.setAttribute('type', 'text');
        inputElement.setAttribute('value', fieldValue);
        inputElement.setAttribute('id', `${fieldId}Input`);

        // Replace the field element with the input for editing
        fieldElement.replaceWith(inputElement);

        // Set focus on the input element
        inputElement.focus();

        // Add event listener for when the user finishes editing
        inputElement.addEventListener('blur', () => {
            // Get the updated field value
            const updatedValue = inputElement.value;

            // Create a new span element with the updated value
            const updatedFieldElement = document.createElement('span');
            updatedFieldElement.classList.add('editable');
            updatedFieldElement.setAttribute('onclick', `enableEditing('${fieldId}')`);
            updatedFieldElement.innerText = updatedValue;

            // Replace the input element with the updated span element
            inputElement.replaceWith(updatedFieldElement);
        });
    }
    </script>
</body>

</html>