<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal</title>
    <link rel="stylesheet" href="\meisuedisonEnt\stylesheet\depoit_withd_popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<!-- Trigger Button -->
 
<!-- Popup -->
<div class="popup" id="withdrawalPopup">
    <div class="popup-content">
        <span class="close-btn" id="closeWithdrawalPopupBtn">&times;</span>
        <form id="withdrawalForm" method="POST" action="/path/to/your/backend">
            <div id="withdrawalFormSection">
                <h2>Withdrawal</h2>
                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label for="withdrawalTransactionType">Transaction Type <span style="color:red">*</span></label>
                            <select id="withdrawalTransactionType" name="transactionType" required>
                                <option value="" disabled selected>Select transaction type</option>
                                <option value="ecobank_Withdrawals">ECOBANK WITHDRAWALS</option>
                                <option value="momo_Withdrawals">MOMO WITHDRAWALS</option>
                                <option value="susu_Withdrawals">SUSU WITHDRAWALS</option>
                                <option value="g_Money_Withdrawals">G-MONEY WITHDRAWALS</option>
                                <option value="remittances_Withdrawals">REMITTANCES WITHDRAWALS</option>
                                <option value="atm_Withdrawals">ATM WITHDRAWALS</option>
                                <option value="voda_Cash_Withdrawals">VODA CASH WITHDRAWALS</option>
                                <option value="ezwich_Withdrawals">EZWICH WITHDRAWALS</option>
                            </select>
                        </div>

                        <div class="form-group" id="withdrawalMomoNumberGroup">
                            <label for="withdrawalMomoNumber">Momo Number <span style="color:red">*</span></label>
                            <input type="number" id="withdrawalMomoNumber" name="momoNumber" placeholder="Enter MOMO Number">
                        </div>

                        <div class="form-group" id="withdrawalAccountNumberGroup">
                            <label for="withdrawalAccountNumber">Account Number <span style="color:red">*</span></label>
                            <input type="text" id="withdrawalAccountNumber" name="accountNumber" placeholder="Enter Account Number">
                        </div>

                        <div class="form-group">
                            <label for="withdrawalBeneficiary">Account Holder <span style="color:red">*</span></label>
                            <input type="text" id="withdrawalBeneficiary" name="beneficiary" placeholder="Enter Account holder" required>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group">
                            <label for="withdrawalAmount">Amount <span style="color:red">*</span></label>
                            <input type="text" id="withdrawalAmount" name="amount" placeholder="Enter Amount" required>
                        </div>

                        <div class="form-group">
                            <label for="withdrawalDepositorsPhone">Phone Number<span style="color:red">*</span></label>
                            <input type="text" id="withdrawalDepositorsPhone" name="phoneNumber" placeholder="Enter Phone Number" required>
                        </div>
                    </div>
                </div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="cancelWithdrawalPopupBtn">Cancel</button>
                    <button type="button" class="submit-btn" id="previewWithdrawalBtn">Preview</button>
                </div>
            </div>
            <div id="withdrawalPreviewSection" class="hidden">
                <h3 style="align-text:center">Confirm</h3>
                <div id="withdrawalPreviewContent"></div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="backWithdrawalBtn">Back</button>
                    <button type="submit" class="submit-btn" id="sendWithdrawalBtn">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('openWithdrawalPopupBtn').addEventListener('click', function() {
    document.getElementById('withdrawalPopup').style.display = 'flex';
    document.body.classList.add('freeze');
});

document.getElementById('closeWithdrawalPopupBtn').addEventListener('click', function() {
    document.getElementById('withdrawalPopup').style.display = 'none';
    document.body.classList.remove('freeze');
});

document.getElementById('cancelWithdrawalPopupBtn').addEventListener('click', function() {
    document.getElementById('withdrawalPopup').style.display = 'none';
    document.body.classList.remove('freeze');
});

document.getElementById('previewWithdrawalBtn').addEventListener('click', function() {
    if (validateWithdrawalForm()) {
        updateWithdrawalPreview();
        document.getElementById('withdrawalFormSection').classList.add('hidden');
        document.getElementById('withdrawalPreviewSection').classList.remove('hidden');
    }
});

document.getElementById('backWithdrawalBtn').addEventListener('click', function() {
    document.getElementById('withdrawalPreviewSection').classList.add('hidden');
    document.getElementById('withdrawalFormSection').classList.remove('hidden');
});

document.getElementById('sendWithdrawalBtn').addEventListener('click', function() {
    alert('Withdrawal successful!');
    document.getElementById('withdrawalPopup').style.display = 'none';
    document.body.classList.remove('freeze');
    location.reload(); // Refresh the page
});

document.getElementById('withdrawalTransactionType').addEventListener('change', function() {
    const momoNumberGroup = document.getElementById('withdrawalMomoNumberGroup');
    const accountNumberGroup = document.getElementById('withdrawalAccountNumberGroup');
    
    if (this.value === 'momo_Withdrawals') {
        momoNumberGroup.style.display = 'block';
        accountNumberGroup.style.display = 'none';
        document.getElementById('withdrawalMomoNumber').required = true;
        document.getElementById('withdrawalAccountNumber').required = false;
    } else {
        momoNumberGroup.style.display = 'none';
        accountNumberGroup.style.display = 'block';
        document.getElementById('withdrawalMomoNumber').required = false;
        document.getElementById('withdrawalAccountNumber').required = true;
    }
});

// Ensure the correct fields are displayed on load
document.getElementById('withdrawalTransactionType').dispatchEvent(new Event('change'));

function updateWithdrawalPreview() {
    const transactionType = document.getElementById('withdrawalTransactionType').value;
    const momoNumber = document.getElementById('withdrawalMomoNumber').value;
    const accountNumber = document.getElementById('withdrawalAccountNumber').value;
    const beneficiary = document.getElementById('withdrawalBeneficiary').value;
    const amount = document.getElementById('withdrawalAmount').value;
    const depositorsPhone = document.getElementById('withdrawalDepositorsPhone').value;

    let previewContent = `
        <p><strong>Transaction Type:</strong> ${transactionType.replace(/([A-Z])/g, ' $1').toUpperCase()}</p>
        ${transactionType === 'momo_Withdrawals' ? `<p><strong>Momo Number:</strong> ${momoNumber}</p>` : `<p><strong>Account Number:</strong> ${accountNumber}</p>`}
        <p><strong>Account Holder:</strong> ${beneficiary}</p>
        <p><strong>Amount:</strong> ${amount}</p>
        <p><strong>Phone Number:</strong> ${depositorsPhone}</p>
    `;
    
    document.getElementById('withdrawalPreviewContent').innerHTML = previewContent;
}

function validateWithdrawalForm() {
    const transactionType = document.getElementById('withdrawalTransactionType').value;
    const momoNumber = document.getElementById('withdrawalMomoNumber').value;
    const accountNumber = document.getElementById('withdrawalAccountNumber').value;
    const beneficiary = document.getElementById('withdrawalBeneficiary').value;
    const amount = document.getElementById('withdrawalAmount').value;

    if (!transactionType) {
        alert('Please select a transaction type.');
        return false;
    }

    if (transactionType === 'momo_Withdrawals' && !momoNumber) {
        alert('Please enter the MOMO number.');
        return false;
    }

    if (transactionType !== 'momo_Withdrawals' && !accountNumber) {
        alert('Please enter the account number.');
        return false;
    }

    if (!beneficiary) {
        alert('Please enter the account holder.');
        return false;
    }

    if (!amount) {
        alert('Please enter the amount.');
        return false;
    }

    return true;
}
</script>

</body>
</html>
