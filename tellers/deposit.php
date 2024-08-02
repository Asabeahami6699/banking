<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
    <link rel="stylesheet" href="\meisuedisonEnt\stylesheet\depoit_withd_popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<!-- Trigger Button -->

<!-- Popup -->
<div class="popup" id="depositPopup">
    <div class="popup-content">
        <span class="close-btn" id="closeDepositPopupBtn">&times;</span>
        <form id="depositForm" action="#" method="post">
            <div id="depositFormSection">
                <h2>Deposit</h2>
                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label for="depositTransactionType">Transaction Type</label>
                            <select id="depositTransactionType" name="transactionType" required>
                                <option value="">Select Transaction Type</option>
                                <option value="MOMO_DEPOSITS">MOMO DEPOSITS</option>
                                <option value="ECOBANK_DEPOSITS">ECOBANK DEPOSITS</option>
                                <option value="SUSU_DEPOSITS">SUSU DEPOSITS</option>
                                <option value="FIDELITY_DEPOSITS">FIDELITY DEPOSITS</option>
                                <option value="CALBANK_DEPOSITS">CALBANK DEPOSITS</option>
                                <option value="OTHER_BANKS_DEPOSITS">OTHER BANKS DEPOSITS</option>
                            </select>
                        </div>
                        
                        <div class="form-group" id="momoNumberGroup">
                            <label for="depositMomoNumber">Momo Number</label>
                            <input type="number" id="depositMomoNumber" name="momoNumber" placeholder="Enter Momo Number" class="styled-input">
                        </div>
    
                        <div class="form-group" id="accountNumberGroup">
                            <label for="depositAccountNumber">Account Number</label>
                            <input type="number" id="depositAccountNumber" name="accountNumber" placeholder="Enter Account Number">
                        </div>
    
                        <div class="form-group">
                            <label for="depositBeneficiary">Account Holder</label>
                            <input type="text" id="depositBeneficiary" name="beneficiary" placeholder="Enter Beneficiary Name" required>
                        </div>
    
                        <div class="form-group">
                            <label for="depositSenderName">Depositor's Name</label>
                            <input type="text" id="depositSenderName" name="senderName" placeholder="Enter Depositor's Name" required>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group">
                            <label for="depositAmount">Amount</label>
                            <input type="number" id="depositAmount" name="amount" placeholder="Enter Amount" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="depositCommissionCharges">Commission/Charges</label>
                            <input type="number" id="depositCommissionCharges" name="commissionCharges" placeholder="Enter Commission/Charges" required>
                        </div>
    
                        <div class="form-group">
                            <label for="depositorsPhone">Depositor's Phone</label>
                            <input type="number" id="depositorsPhone" name="depositorPhone" placeholder="Enter Depositor's Phone Number">
                        </div>
                    </div>
                </div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="cancelDepositPopupBtn">Cancel</button>
                    <button type="button" class="submit-btn" id="depositPreviewBtn">Preview</button>
                </div>
            </div>
            <div id="depositPreviewSection" class="hidden">
                <h2>Preview</h2>
                <div id="depositPreviewContent"></div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="depositBackBtn">Back</button>
                    <button type="submit" class="submit-btn" id="depositSendBtn">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function updateDepositPreview() {
    const transactionType = document.getElementById('depositTransactionType').value;
    const momoNumber = document.getElementById('depositMomoNumber').value;
    const accountNumber = document.getElementById('depositAccountNumber').value;
    const senderName = document.getElementById('depositSenderName').value;
    const beneficiary = document.getElementById('depositBeneficiary').value;
    const amount = document.getElementById('depositAmount').value;
    const commissionCharges = document.getElementById('depositCommissionCharges').value;
    const depositorsPhone = document.getElementById('depositorsPhone').value;

    let previewContent = 
        `<p><strong>Transaction Type:</strong> ${transactionType.replace('_', ' ')}</p>
        ${transactionType === 'MOMO_DEPOSITS' ? `<p><strong>MOMO Number:</strong> ${momoNumber}</p>` : `<p><strong>Account Number:</strong> ${accountNumber}</p>`}
        <p><strong>Account Holder:</strong> ${beneficiary}</p>
        <p><strong>Depositor's Name:</strong> ${senderName}</p>
        <p><strong>Amount:</strong> ${amount}</p>
        <p><strong>Commission/Charges:</strong> ${commissionCharges}</p>
        <p><strong>Depositor's Phone:</strong> ${depositorsPhone}</p>`;
    
    document.getElementById('depositPreviewContent').innerHTML = previewContent;
}

function validateDepositForm() {
    const transactionType = document.getElementById('depositTransactionType').value;
    const momoNumber = document.getElementById('depositMomoNumber').value;
    const accountNumber = document.getElementById('depositAccountNumber').value;
    const senderName = document.getElementById('depositSenderName').value;
    const beneficiary = document.getElementById('depositBeneficiary').value;
    const amount = document.getElementById('depositAmount').value;
    const commissionCharges = document.getElementById('depositCommissionCharges').value;

    // Check if required fields are filled out
    if (!transactionType || !senderName || !beneficiary || !amount || !commissionCharges || 
        (transactionType === 'MOMO_DEPOSITS' && !momoNumber) ||
        (transactionType !== 'MOMO_DEPOSITS' && !accountNumber)) {
        alert('Please fill out all required fields.');
        return false;
    }

    return true;
}

function storeDataInSessionStorage() {
    const transactionType = document.getElementById('depositTransactionType').value;
    const momoNumber = document.getElementById('depositMomoNumber').value;
    const accountNumber = document.getElementById('depositAccountNumber').value;
    const senderName = document.getElementById('depositSenderName').value;
    const beneficiary = document.getElementById('depositBeneficiary').value;
    const amount = document.getElementById('depositAmount').value;
    const commissionCharges = document.getElementById('depositCommissionCharges').value;
    const depositorsPhone = document.getElementById('depositorsPhone').value;

    sessionStorage.setItem('depositTransactionType', transactionType);
    sessionStorage.setItem('depositMomoNumber', momoNumber);
    sessionStorage.setItem('depositAccountNumber', accountNumber);
    sessionStorage.setItem('depositSenderName', senderName);
    sessionStorage.setItem('depositBeneficiary', beneficiary);
    sessionStorage.setItem('depositAmount', amount);
    sessionStorage.setItem('depositCommissionCharges', commissionCharges);
    sessionStorage.setItem('depositorsPhone', depositorsPhone);
}

function restoreDataFromSessionStorage() {
    if (sessionStorage.getItem('depositTransactionType')) {
        document.getElementById('depositTransactionType').value = sessionStorage.getItem('depositTransactionType');
        document.getElementById('depositMomoNumber').value = sessionStorage.getItem('depositMomoNumber');
        document.getElementById('depositAccountNumber').value = sessionStorage.getItem('depositAccountNumber');
        document.getElementById('depositSenderName').value = sessionStorage.getItem('depositSenderName');
        document.getElementById('depositBeneficiary').value = sessionStorage.getItem('depositBeneficiary');
        document.getElementById('depositAmount').value = sessionStorage.getItem('depositAmount');
        document.getElementById('depositCommissionCharges').value = sessionStorage.getItem('depositCommissionCharges');
        document.getElementById('depositorsPhone').value = sessionStorage.getItem('depositorsPhone');
    }
}

document.getElementById('openDepositBtn').addEventListener('click', function() {
    document.getElementById('depositPopup').style.display = 'flex';
    document.body.classList.add('freeze');
});

document.getElementById('closeDepositPopupBtn').addEventListener('click', function() {
    document.getElementById('depositPopup').style.display = 'none';
    document.body.classList.remove('freeze');
});

document.getElementById('cancelDepositPopupBtn').addEventListener('click', function() {
    document.getElementById('depositPopup').style.display = 'none';
    document.body.classList.remove('freeze');
});

document.getElementById('depositPreviewBtn').addEventListener('click', function() {
    if (validateDepositForm()) {
        updateDepositPreview();
        document.getElementById('depositFormSection').classList.add('hidden');
        document.getElementById('depositPreviewSection').classList.remove('hidden');
    }
});

document.getElementById('depositBackBtn').addEventListener('click', function() {
    document.getElementById('depositFormSection').classList.remove('hidden');
    document.getElementById('depositPreviewSection').classList.add('hidden');
});

document.getElementById('depositSendBtn').addEventListener('click', function(event) {
    event.preventDefault();
    storeDataInSessionStorage();
    document.getElementById('depositPopup').style.display = 'none';
    document.body.classList.remove('freeze');
    document.getElementById('depositForm').submit();
});

window.addEventListener('load', function() {
    restoreDataFromSessionStorage();
    document.getElementById('depositTransactionType').addEventListener('change', function() {
        const transactionType = this.value;
        if (transactionType === 'MOMO_DEPOSITS') {
            document.getElementById('momoNumberGroup').style.display = 'block';
            document.getElementById('accountNumberGroup').style.display = 'none';
        } else {
            document.getElementById('momoNumberGroup').style.display = 'none';
            document.getElementById('accountNumberGroup').style.display = 'block';
        }
    });
});
</script>

</body>
</html>
