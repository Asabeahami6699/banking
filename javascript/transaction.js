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
