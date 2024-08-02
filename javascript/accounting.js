document.addEventListener('DOMContentLoaded', function() {
    // Open popup
    document.getElementById('openAccountingBtn').addEventListener('click', function() {
        document.getElementById('accountingPopupForm').style.display = 'flex';
        document.body.classList.add('freeze');
    });

    // Close popup
    document.getElementById('closeAccountingPopupBtn').addEventListener('click', function() {
        document.getElementById('accountingPopupForm').style.display = 'none';
        document.body.classList.remove('freeze');
    });

    // Cancel button
    document.getElementById('cancelAccountingPopupBtn').addEventListener('click', function() {
        document.getElementById('accountingPopupForm').style.display = 'none';
        document.body.classList.remove('freeze');
    });

    // Preview button
    document.getElementById('previewAccountingBtn').addEventListener('click', function() {
        if (validateForm()) {
            updatePreview();
            document.getElementById('formSection').classList.add('hidden');
            document.getElementById('previewSection').classList.remove('hidden');
        } else {
            alert('Please fill out all required fields.');
        }
    });

    // Back button
    document.getElementById('backAccountingBtn').addEventListener('click', function() {
        document.getElementById('previewSection').classList.add('hidden');
        document.getElementById('formSection').classList.remove('hidden');
    });

    // Send button
    document.getElementById('sendAccountingBtn').addEventListener('click', function() {
        alert('Transaction sent successfully!');
        document.getElementById('accountingPopupForm').style.display = 'none';
        document.body.classList.remove('freeze');
        location.reload(); // Refresh the page
    });

    // Show/hide description based on transaction type
    document.getElementById('transactionType').addEventListener('change', function() {
        const descriptionGroup = document.getElementById('descriptionGroup');
        
        if (this.value === 'expenses') {
            descriptionGroup.style.display = 'block';
        } else {
            descriptionGroup.style.display = 'none';
        }
    });

    // Ensure the correct fields are displayed on load
    document.getElementById('transactionType').dispatchEvent(new Event('change'));

    // Update preview
    function updatePreview() {
        const transactionType = document.getElementById('transactionType').value;
        const amount = document.getElementById('amount').value;
        const name = document.getElementById('name').value;
        const description = document.getElementById('description').value;

        let previewContent = 
            `<p><strong>Transaction Type:</strong> ${transactionType.replace(/([A-Z])/g, ' $1').trim()}</p>
            <p><strong>Amount:</strong> ${amount}</p>
            <p><strong>Name:</strong> ${name}</p>
            ${transactionType === 'expenses' ? `<p><strong>Description:</strong> ${description}</p>` : ''}
        `;
        
        document.getElementById('previewContent').innerHTML = previewContent;
    }

    // Validate form
    function validateForm() {
        const transactionType = document.getElementById('transactionType').value;
        const amount = document.getElementById('amount').value;
        const name = document.getElementById('name').value;
        const description = document.getElementById('description').value;

        if (!transactionType || !amount || !name || (transactionType === 'expenses' && !description)) {
            return false;
        }

        return true;
    }
});
