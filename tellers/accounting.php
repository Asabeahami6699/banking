<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="\meisuedisonEnt\stylesheet\depoit_withd_popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<!-- Trigger Button -->


<!-- Popup -->
<div class="popup" id="accountingPopupForm">
    <div class="popup-content">
        <span class="close-btn" id="closeAccountingPopupBtn">&times;</span>
        <div id="formSectionAccounting">
            <h2>Transaction</h2>
            <div class="form-row">
                <div class="form-column">
                    <div class="form-group">
                        <label for="transactionTypeAccounting">Transaction Type <span style="color:red">*</span></label>
                        <select id="transactionTypeAccounting" required>
                            <option value="" disabled selected>Select transaction type</option>
                            <option value="openingBalance">Opening Balance</option>
                            <option value="expenses">Expenses</option>
                            <option value="cashToBank">Cash to Bank</option>
                            <option value="remainingCash">Remaining Cash</option>
                            <option value="physicalCashCollected">Physical Cash Collected</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="amountAccounting">Amount <span style="color:red">*</span></label>
                        <input type="text" id="amountAccounting" placeholder="Enter Amount" required>
                    </div>

                    <div class="form-group" id="nameGroupAccounting">
                        <label for="nameAccounting">Name <span style="color:red">*</span></label>
                        <input type="text" id="nameAccounting" placeholder="Enter Name" required>
                    </div>

                    <div class="form-group" id="descriptionGroupAccounting">
                        <label for="descriptionAccounting">Description <span style="color:red">*</span></label>
                        <input type="text" id="descriptionAccounting" placeholder="Enter Description">
                    </div>
                </div>
            </div>
            <div class="button-group">
                <button class="cancel-btn" id="cancelAccountingPopupBtn">Cancel</button>
                <button class="submit-btn" id="previewAccountingBtn">Preview</button>
            </div>
        </div>
        <div id="previewSectionAccounting" class="hidden">
            <h2>Preview</h2>
            <div id="previewContentAccounting"></div>
            <div class="button-group">
                <button class="cancel-btn" id="backAccountingBtn">Back</button>
                <button class="submit-btn" id="sendAccountingBtn">Send</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('openAccountingBtn').addEventListener('click', function() {
        document.getElementById('accountingPopupForm').style.display = 'flex';
        document.body.classList.add('freeze');
    });

    document.getElementById('closeAccountingPopupBtn').addEventListener('click', function() {
        document.getElementById('accountingPopupForm').style.display = 'none';
        document.body.classList.remove('freeze');
    });

    document.getElementById('cancelAccountingPopupBtn').addEventListener('click', function() {
        document.getElementById('accountingPopupForm').style.display = 'none';
        document.body.classList.remove('freeze');
    });

    document.getElementById('previewAccountingBtn').addEventListener('click', function() {
        if (validateAccountingForm()) {
            updateAccountingPreview();
            document.getElementById('formSectionAccounting').classList.add('hidden');
            document.getElementById('previewSectionAccounting').classList.remove('hidden');
        } else {
            alert('Please fill out all required fields.');
        }
    });

    document.getElementById('backAccountingBtn').addEventListener('click', function() {
        document.getElementById('previewSectionAccounting').classList.add('hidden');
        document.getElementById('formSectionAccounting').classList.remove('hidden');
    });

    document.getElementById('sendAccountingBtn').addEventListener('click', function() {
        alert('Transaction sent successfully!');
        document.getElementById('accountingPopupForm').style.display = 'none';
        document.body.classList.remove('freeze');
        location.reload(); // Refresh the page
    });

    document.getElementById('transactionTypeAccounting').addEventListener('change', function() {
        const descriptionGroup = document.getElementById('descriptionGroupAccounting');
        
        if (this.value === 'expenses') {
            descriptionGroup.style.display = 'block';
        } else {
            descriptionGroup.style.display = 'none';
        }
    });

    // Ensure the correct fields are displayed on load
    document.getElementById('transactionTypeAccounting').dispatchEvent(new Event('change'));

    function updateAccountingPreview() {
        const transactionType = document.getElementById('transactionTypeAccounting').value;
        const amount = document.getElementById('amountAccounting').value;
        const name = document.getElementById('nameAccounting').value;
        const description = document.getElementById('descriptionAccounting').value;

        let previewContent = 
            `<p><strong>Transaction Type:</strong> ${transactionType.replace(/([A-Z])/g, ' $1').trim()}</p>
            <p><strong>Amount:</strong> ${amount}</p>
            <p><strong>Name:</strong> ${name}</p>
            ${transactionType === 'expenses' ? `<p><strong>Description:</strong> ${description}</p>` : ''}
        `;
        
        document.getElementById('previewContentAccounting').innerHTML = previewContent;
    }

    function validateAccountingForm() {
        const transactionType = document.getElementById('transactionTypeAccounting').value;
        const amount = document.getElementById('amountAccounting').value;
        const name = document.getElementById('nameAccounting').value;
        const description = document.getElementById('descriptionAccounting').value;

        if (!transactionType || !amount || !name || (transactionType === 'expenses' && !description)) {
            return false;
        }

        return true;
    }
</script>
</body>
</html>
