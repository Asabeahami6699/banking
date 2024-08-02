window.onload = function() {
    // Retrieve data from session storage
    const transactionType = sessionStorage.getItem('depositTransactionType');
    const depositAmount = parseFloat(sessionStorage.getItem('depositAmount')) || 0;

    // Update deposit table
    if (transactionType) {
        const typeMapping = {
            'MOMO_DEPOSITS': 'MOMO DEPOSITS',
            'ECOBANK_DEPOSITS': 'ECOBANK DEPOSITS',
            'SUSU_DEPOSITS': 'SUSU DEPOSITS',
            'FIDELITY_DEPOSITS': 'FIDELITY DEPOSITS',
            'CALBANK_DEPOSITS': 'CALBANK DEPOSITS',
            'OTHER_BANKS_DEPOSITS': 'OTHER BANKS DEPOSITS'
        };

        const depositRow = Array.from(document.querySelectorAll('tr')).find(row => {
            const cell = row.querySelector('td:first-child');
            return cell && cell.textContent.includes(typeMapping[transactionType]);
        });

        if (depositRow) {
            const amountCell = depositRow.querySelector('td:last-child');
            let currentAmount = parseFloat(amountCell.textContent.replace(/[^0-9.-]+/g, "")) || 0;
            amountCell.textContent = `$${(currentAmount + depositAmount).toFixed(2)}`;
        }
    }

    // Update totals
    const totalDeposit = Array.from(document.querySelectorAll('#totalDeposit')).reduce((sum, cell) => 
        sum + parseFloat(cell.textContent.replace(/[^0-9.-]+/g, "")) || 0, 0);
        
    document.getElementById('totalDeposit').textContent = `$${totalDeposit.toFixed(2)}`;
    
    calculateDifference(); // Update difference

    // Clear session storage after retrieving data
    sessionStorage.removeItem('depositTransactionType');
    sessionStorage.removeItem('depositAmount');
};
