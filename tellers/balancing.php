<?php include $_SERVER['DOCUMENT_ROOT'] . '\meisuedisonEnt\tellers\navbarTeller.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <link rel="stylesheet" href="\meisuedisonEnt\stylesheet\balancing.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Deposit Report</h2>
            <table>
                <thead>
                    <tr>
                        <th>Total Deposit</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MOMO DEPOSITS</td>
                        <td id="momoDepositAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>ECOBANK DEPOSITS</td>
                        <td id="ecobankDepositAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>SUSU DEPOSITS</td>
                        <td id="susuDepositAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>FIDELITY DEPOSITS</td>
                        <td id="fidelityDepositAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>CALBANK DEPOSITS</td>
                        <td id="calbankDepositAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>OTHER BANKS DEPOSITS</td>
                        <td id="otherBanksDepositAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>P-CASH COLLECTED BY TELLER</td>
                        <td id="pcashCollectedAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td><strong>TOTAL</strong></td>
                        <td><strong id="totalDeposit">$0.00</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card">
            <h2>Withdrawals Report</h2>
            <table>
                <thead>
                    <tr>
                        <th>Total Withdrawals</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ECOBANK WITHDRAWALS</td>
                        <td id="ecobankWithdrawalAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>MOMO WITHDRAWALS</td>
                        <td id="momoWithdrawalAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>SUSU WITHDRAWALS</td>
                        <td id="susuWithdrawalAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>G-MONEY WITHDRAWALS</td>
                        <td id="gMoneyWithdrawalAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>REMITTANCES WITHDRAWALS</td>
                        <td id="remittancesWithdrawalAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>ATM WITHDRAWALS</td>
                        <td id="atmWithdrawalAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>VODA CASH WITHDRAWALS</td>
                        <td id="vodaCashWithdrawalAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>EZWICH WITHDRAWALS</td>
                        <td id="ezwichWithdrawalAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td>LOAD/CASH TO BANK</td>
                        <td id="loadCashToBankAmount">$0.00</td>
                    </tr>
                    <tr>
                        <td><strong>P. CASH REMAINING</strong></td>
                        <td><strong id="pcashRemainingAmount">$0.00</strong></td>
                    </tr>
                    <tr>
                        <td><strong>EXPENSES</strong></td>
                        <td><strong id="expensesAmount">$0.00</strong></td>
                    </tr>
                    <tr>
                        <td><strong>TOTAL</strong></td>
                        <td><strong id="totalWithdrawal">$0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="difference-box">
        <label for="difference">Difference:</label>
        <div id="difference">$0.00</div>
    </div>
    <script>
        window.onload = function() {
            // Retrieve data from local storage
            const depositTransactions = JSON.parse(localStorage.getItem('depositTransactions')) || [];

            // Update deposit table
            depositTransactions.forEach(transaction => {
                const depositAmount = transaction.amount;
                const depositId = transaction.id;

                if (depositId) {
                    const amountCell = document.getElementById(depositId);
                    let currentAmount = parseFloat(amountCell.textContent.replace(/[^0-9.-]+/g, "")) || 0;
                    amountCell.textContent = `$${(currentAmount + depositAmount).toFixed(2)}`;
                }
            });

            // Calculate the total deposit amount
            const totalDeposit = Array.from(document.querySelectorAll('td[id$="DepositAmount"]')).reduce((sum, cell) => 
                sum + parseFloat(cell.textContent.replace(/[^0-9.-]+/g, "")) || 0, 0);
                
            document.getElementById('totalDeposit').textContent = `$${totalDeposit.toFixed(2)}`;

            calculateDifference(); // Update difference
        };

        function calculateDifference() {
            const totalDeposit = parseFloat(document.getElementById('totalDeposit').textContent.replace(/[^0-9.-]+/g, ""));
            const totalWithdrawal = parseFloat(document.getElementById('totalWithdrawal').textContent.replace(/[^0-9.-]+/g, ""));
            const difference = totalDeposit - totalWithdrawal;
            document.getElementById('difference').textContent = `$${difference.toFixed(2)}`;
        }
    </script>
</body>
</html>
