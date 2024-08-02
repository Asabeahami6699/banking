<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Popup Background Freeze */
body.freeze {
    overflow: hidden;
}

/* Popup Styles */
.popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.popup-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    width: 500px; /* Adjusted width for the two-column layout */
    position: relative;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}

/* Form Styles */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"], select {
    width: 100%; /* Ensure inputs fill the form group width */
    padding: 8px;
    box-sizing: border-box;
}

button {
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Two-column layout for forms */
.form-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.form-column {
    flex: 1;
}

/* Button Groups */
.button-group {
    display: flex;
    justify-content: center;
    gap: 40px;
}

.button-group button.submit-btn {
    background-color: #4CAF50;
    color: white;
}

.button-group button.cancel-btn {
    background-color: #f44336;
    color: white;
}

/* Visibility Handling */
.hidden {
    display: none;
}

/* Form-Specific Styles */
#depositPopup .form-group,
#withdrawalPopup .form-group,
#accountingPopup .form-group {
    margin-bottom: 15px;
}

#depositPopup select,
#withdrawalPopup select,
#accountingPopup select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

#depositPopup input,
#withdrawalPopup input,
#accountingPopup input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

</style>
    
<body>
<button onclick="openPopup('depositPopup')">Deposit</button>
    <button onclick="openPopup('withdrawalPopup')">Withdrawal</button>
    <button onclick="openPopup('accountingPopupForm')">Accounting</button>
<!-- Deposit Form -->

<div class="popup" id="depositPopup">
    <div class="popup-content">
        <span class="close-btn" id="closeDepositPopupBtn">&times;</span>
        <div id="depositFormSection">
            <h2>Deposit</h2>
            <form id="depositForm" action="process_form.php" method="post">
                <input type="hidden" name="form_type" value="deposit">
                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label for="depositTransactionType">Transaction Type</label>
                            <select id="depositTransactionType" name="depositTransactionType" required>
                                <option value="">Select Transaction Type</option>
                                <option value="MOMO_DEPOSITS">MOMO DEPOSITS</option>
                                <option value="ECOBANK_DEPOSITS">ECOBANK DEPOSITS</option>
                                <option value="SUSU_DEPOSITS">SUSU DEPOSITS</option>
                                <option value="FIDELITY_DEPOSITS">FIDELITY DEPOSITS</option>
                                <option value="CALBANK_DEPOSITS">CALBANK DEPOSITS</option>
                                <option value="OTHER_BANKS_DEPOSITS">OTHER BANKS DEPOSITS</option>
                            </select>
                        </div>
                        <div class="form-group" id="depositMomoNumberGroup">
                            <label for="depositMomoNumber">Momo Number</label>
                            <input type="number" id="depositMomoNumber" name="depositMomoNumber" placeholder="Enter MOMO Number">
                        </div>
                        <div class="form-group" id="depositAccountNumberGroup">
                            <label for="depositAccountNumber">Account Number</label>
                            <input type="number" id="depositAccountNumber" name="depositAccountNumber" placeholder="Enter Account Number">
                        </div>
                        <div class="form-group">
                            <label for="depositBeneficiary">Account Holder</label>
                            <input type="text" id="depositBeneficiary" name="depositBeneficiary" placeholder="Enter Beneficiary Name" required>
                        </div>
                        <div class="form-group">
                            <label for="depositSenderName">Depositor's Name</label>
                            <input type="text" id="depositSenderName" name="depositSenderName" placeholder="Enter Depositor's Name" required>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group">
                            <label for="depositAmount">Amount</label>
                            <input type="number" id="depositAmount" name="depositAmount" placeholder="Enter Amount" required>
                        </div>
                        <div class="form-group">
                            <label for="depositCommissionCharges">Commission/Charges</label>
                            <input type="number" id="depositCommissionCharges" name="depositCommissionCharges" placeholder="Enter Commission/Charges" required>
                        </div>
                        <div class="form-group">
                            <label for="depositDepositorsPhone">Depositor's Phone</label>
                            <input type="number" id="depositDepositorsPhone" name="depositDepositorsPhone" placeholder="Enter Depositor's Phone Number">
                        </div>
                    </div>
                </div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="cancelDepositPopupBtn">Cancel</button>
                    <button type="button" class="submit-btn" onclick="previewDeposit()">Preview</button>
                </div>
            </form>
            <div id="depositPreviewSection" class="hidden">
                <h2>Preview</h2>
                <div id="depositPreviewContent"></div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="backDepositBtn">Back</button>
                    <button type="button" class="submit-btn" onclick="submitDepositForm()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Withdrawal Form -->
<div class="popup" id="withdrawalPopup">
    <div class="popup-content">
        <span class="close-btn" id="closeWithdrawalPopupBtn">&times;</span>
        <div id="withdrawalFormSection">
            <h2>Withdrawal</h2>
            <form id="withdrawalForm" action="process_form.php" method="post">
                <input type="hidden" name="form_type" value="withdrawal">
                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label for="withdrawalTransactionType">Transaction Type <span style="color:red">*</span></label>
                            <select id="withdrawalTransactionType" name="withdrawalTransactionType" required>
                                <option value="" disabled selected>Select transaction type</option>
                                <option value="ecobankWithdrawals">ECOBANK WITHDRAWALS</option>
                                <option value="momoWithdrawals">MOMO WITHDRAWALS</option>
                                <option value="susuWithdrawals">SUSU WITHDRAWALS</option>
                                <option value="gMoneyWithdrawals">G-MONEY WITHDRAWALS</option>
                                <option value="remittancesWithdrawals">REMITTANCES WITHDRAWALS</option>
                                <option value="atmWithdrawals">ATM WITHDRAWALS</option>
                                <option value="vodaCashWithdrawals">VODA CASH WITHDRAWALS</option>
                                <option value="ezwichWithdrawals">EZWICH WITHDRAWALS</option>
                            </select>
                        </div>
                        <div class="form-group" id="withdrawalMomoNumberGroup">
                            <label for="withdrawalMomoNumber">Momo Number <span style="color:red">*</span></label>
                            <input type="text" id="withdrawalMomoNumber" name="withdrawalMomoNumber" placeholder="Enter MOMO Number">
                        </div>
                        <div class="form-group" id="withdrawalAccountNumberGroup">
                            <label for="withdrawalAccountNumber">Account Number <span style="color:red">*</span></label>
                            <input type="text" id="withdrawalAccountNumber" name="withdrawalAccountNumber" placeholder="Enter Account Number">
                        </div>
                        <div class="form-group">
                            <label for="withdrawalBeneficiary">Account Holder <span style="color:red">*</span></label>
                            <input type="text" id="withdrawalBeneficiary" name="withdrawalBeneficiary" placeholder="Enter Account holder" required>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group">
                            <label for="withdrawalAmount">Amount <span style="color:red">*</span></label>
                            <input type="text" id="withdrawalAmount" name="withdrawalAmount" placeholder="Enter Amount" required>
                        </div>
                        <div class="form-group">
                            <label for="withdrawalDepositorsPhone">Phone Number <span style="color:red">*</span></label>
                            <input type="text" id="withdrawalDepositorsPhone" name="withdrawalDepositorsPhone" placeholder="Enter Phone Number" required>
                        </div>
                    </div>
                </div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="cancelWithdrawalPopupBtn">Cancel</button>
                    <button type="button" class="submit-btn" onclick="previewWithdrawal()">Preview</button>
                </div>
            </form>
            <div id="withdrawalPreviewSection" class="hidden">
                <h2>Preview</h2>
                <div id="withdrawalPreviewContent"></div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="backWithdrawalBtn">Back</button>
                    <button type="button" class="submit-btn" onclick="submitWithdrawalForm()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Accounting Form -->
<div class="popup" id="accountingPopupForm">
    <div class="popup-content">
        <span class="close-btn" id="closeAccountingPopupBtn">&times;</span>
        <div id="accountingFormSection">
            <h2>Transaction</h2>
            <form id="accountingForm" action="process_form.php" method="post">
                <input type="hidden" name="form_type" value="accounting">
                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label for="accountingTransactionType">Transaction Type <span style="color:red">*</span></label>
                            <select id="accountingTransactionType" name="accountingTransactionType" required>
                                <option value="" disabled selected>Select transaction type</option>
                                <option value="openingBalance">Opening Balance</option>
                                <option value="expenses">Expenses</option>
                                <option value="cashToBank">Cash to Bank</option>
                                <option value="remainingCash">Remaining Cash</option>
                                <option value="physicalCashCollected">Physical Cash Collected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="accountingAmount">Amount <span style="color:red">*</span></label>
                            <input type="text" id="accountingAmount" name="accountingAmount" placeholder="Enter Amount" required>
                        </div>
                        <div class="form-group" id="accountingNameGroup">
                            <label for="accountingName">Name <span style="color:red">*</span></label>
                            <input type="text" id="accountingName" name="accountingName" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group" id="accountingDescriptionGroup">
                            <label for="accountingDescription">Description <span style="color:red">*</span></label>
                            <input type="text" id="accountingDescription" name="accountingDescription" placeholder="Enter Description">
                        </div>
                    </div>
                </div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="cancelAccountingPopupBtn">Cancel</button>
                    <button type="button" class="submit-btn" onclick="previewAccounting()">Preview</button>
                </div>
            </form>
            <div id="accountingPreviewSection" class="hidden">
                <h2>Preview</h2>
                <div id="accountingPreviewContent"></div>
                <div class="button-group">
                    <button type="button" class="cancel-btn" id="backAccountingBtn">Back</button>
                    <button type="button" class="submit-btn" onclick="submitAccountingForm()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    // Function to open a popup
    function openPopup(popupId) {
        document.getElementById(popupId).style.display = 'block';
    }

    // Function to close a popup
    function closePopup(popupId) {
        document.getElementById(popupId).style.display = 'none';
    }

    // Function to validate form
    function validateForm(formId) {
        const form = document.getElementById(formId);
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;
        requiredFields.forEach(field => {
            if (field.value.trim() === '') {
                isValid = false;
            }
        });
        return isValid;
    }

    // Functions for preview and submit actions
    function previewDeposit() {
        const isValid = validateForm('depositForm');
        if (!isValid) {
            alert('Please fill out all required fields.');
            return;
        }
        document.getElementById('depositPreviewContent').innerHTML = `
            <p><strong>Transaction Type:</strong> ${document.getElementById('depositTransactionType').value}</p>
            <p><strong>Momo Number:</strong> ${document.getElementById('depositMomoNumber').value}</p>
            <p><strong>Account Number:</strong> ${document.getElementById('depositAccountNumber').value}</p>
            <p><strong>Account Holder:</strong> ${document.getElementById('depositBeneficiary').value}</p>
            <p><strong>Depositor's Name:</strong> ${document.getElementById('depositSenderName').value}</p>
            <p><strong>Amount:</strong> ${document.getElementById('depositAmount').value}</p>
            <p><strong>Commission/Charges:</strong> ${document.getElementById('depositCommissionCharges').value}</p>
            <p><strong>Depositor's Phone:</strong> ${document.getElementById('depositDepositorsPhone').value}</p>
        `;
        document.getElementById('depositFormSection').classList.add('hidden');
        document.getElementById('depositPreviewSection').classList.remove('hidden');
    }

    function submitDepositForm() {
        document.getElementById('depositForm').submit();
    }

    function previewWithdrawal() {
        const isValid = validateForm('withdrawalForm');
        if (!isValid) {
            alert('Please fill out all required fields.');
            return;
        }
        document.getElementById('withdrawalPreviewContent').innerHTML = `
            <p><strong>Transaction Type:</strong> ${document.getElementById('withdrawalTransactionType').value}</p>
            <p><strong>Momo Number:</strong> ${document.getElementById('withdrawalMomoNumber').value}</p>
            <p><strong>Account Number:</strong> ${document.getElementById('withdrawalAccountNumber').value}</p>
            <p><strong>Account Holder:</strong> ${document.getElementById('withdrawalBeneficiary').value}</p>
            <p><strong>Amount:</strong> ${document.getElementById('withdrawalAmount').value}</p>
            <p><strong>Depositor's Phone:</strong> ${document.getElementById('withdrawalDepositorsPhone').value}</p>
        `;
        document.getElementById('withdrawalFormSection').classList.add('hidden');
        document.getElementById('withdrawalPreviewSection').classList.remove('hidden');
    }

    function submitWithdrawalForm() {
        document.getElementById('withdrawalForm').submit();
    }

    function previewAccounting() {
        const isValid = validateForm('accountingForm');
        if (!isValid) {
            alert('Please fill out all required fields.');
            return;
        }
        document.getElementById('accountingPreviewContent').innerHTML = `
            <p><strong>Transaction Type:</strong> ${document.getElementById('accountingTransactionType').value}</p>
            <p><strong>Amount:</strong> ${document.getElementById('accountingAmount').value}</p>
            <p><strong>Name:</strong> ${document.getElementById('accountingName').value}</p>
            <p><strong>Description:</strong> ${document.getElementById('accountingDescription').value}</p>
        `;
        document.getElementById('accountingFormSection').classList.add('hidden');
        document.getElementById('accountingPreviewSection').classList.remove('hidden');
    }

    function submitAccountingForm() {
        document.getElementById('accountingForm').submit();
    }

    // Event listeners for field visibility based on selection
    document.getElementById('depositTransactionType').addEventListener('change', (e) => {
        const accountNumberGroup = document.getElementById('depositAccountNumberGroup');
        if (e.target.value.includes('MOMO_DEPOSITS')) {
            accountNumberGroup.style.display = 'none';
        } else {
            accountNumberGroup.style.display = 'block';
        }
    });

    document.getElementById('withdrawalTransactionType').addEventListener('change', (e) => {
        const accountNumberGroup = document.getElementById('withdrawalAccountNumberGroup');
        const momoOptions = ['momoWithdrawals', 'vodaCashWithdrawals'];
        if (momoOptions.includes(e.target.value)) {
            accountNumberGroup.style.display = 'none';
        } else {
            accountNumberGroup.style.display = 'block';
        }
    });

    document.getElementById('accountingTransactionType').addEventListener('change', (e) => {
        const descriptionGroup = document.getElementById('accountingDescriptionGroup');
        if (e.target.value === 'expenses') {
            descriptionGroup.style.display = 'block';
        } else {
            descriptionGroup.style.display = 'none';
        }
    });

    // Event listeners for closing popups
    document.getElementById('closeDepositPopupBtn').addEventListener('click', () => {
        closePopup('depositPopup');
    });
    document.getElementById('closeWithdrawalPopupBtn').addEventListener('click', () => {
        closePopup('withdrawalPopup');
    });
    document.getElementById('closeAccountingPopupBtn').addEventListener('click', () => {
        closePopup('accountingPopupForm');
    });

    // Event listeners for cancel buttons
    document.getElementById('cancelDepositPopupBtn').addEventListener('click', () => {
        closePopup('depositPopup');
    });
    document.getElementById('cancelWithdrawalPopupBtn').addEventListener('click', () => {
        closePopup('withdrawalPopup');
    });
    document.getElementById('cancelAccountingPopupBtn').addEventListener('click', () => {
        closePopup('accountingPopupForm');
    });

    // Event listeners for back buttons
    document.getElementById('backDepositBtn').addEventListener('click', () => {
        document.getElementById('depositPreviewSection').classList.add('hidden');
        document.getElementById('depositFormSection').classList.remove('hidden');
    });
    document.getElementById('backWithdrawalBtn').addEventListener('click', () => {
        document.getElementById('withdrawalPreviewSection').classList.add('hidden');
        document.getElementById('withdrawalFormSection').classList.remove('hidden');
    });
    document.getElementById('backAccountingBtn').addEventListener('click', () => {
        document.getElementById('accountingPreviewSection').classList.add('hidden');
        document.getElementById('accountingFormSection').classList.remove('hidden');
    });
});

</script>
</body>
</html>