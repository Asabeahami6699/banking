<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit and Expense Tracker</title>
    <style>
        /* Basic styling for the example */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .form-container, .table-container {
            margin-bottom: 20px;
        }

        .form-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
        }

        .form-container input {
            margin-bottom: 10px;
            padding: 8px;
            width: calc(100% - 16px);
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead {
            background-color: #f4f4f4;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Submit Deposit and Expense</h2>
        <form id="transactionForm">
            <label for="deposit">Deposit Amount:</label>
            <input type="number" id="deposit" name="deposit" step="0.01">

            <label for="expense">Expense Amount:</label>
            <input type="number" id="expense" name="expense" step="0.01">

            <button type="button" onclick="updateTable()">Submit</button>
        </form>
    </div>

    <div class="table-container">
        <h2>Transaction Table</h2>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="transactionTableBody">
                <tr>
                    <td>Deposit</td>
                    <td id="depositAmount">$0.00</td>
                </tr>
                <tr>
                    <td>Expense</td>
                    <td id="expenseAmount">$0.00</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function updateTable() {
            // Get input values
            const depositInput = document.getElementById('deposit').value;
            const expenseInput = document.getElementById('expense').value;

            const depositAmount = parseFloat(depositInput) || 0;
            const expenseAmount = parseFloat(expenseInput) || 0;

            // Get existing amounts from the table
            const existingDeposit = parseFloat(document.getElementById('depositAmount').textContent.replace('$', '')) || 0;
            const existingExpense = parseFloat(document.getElementById('expenseAmount').textContent.replace('$', '')) || 0;

            // Calculate new totals
            const newDepositAmount = existingDeposit + depositAmount;
            const newExpenseAmount = existingExpense + expenseAmount;

            // Update table
            document.getElementById('depositAmount').textContent = `$${newDepositAmount.toFixed(2)}`;
            document.getElementById('expenseAmount').textContent = `$${newExpenseAmount.toFixed(2)}`;

            // Clear the form fields after submission
            document.getElementById('transactionForm').reset();
        }
    </script>

    <?php
    // If needed, you can handle form submission and processing with PHP here
    // For this example, PHP is not necessary
    ?>
</body>
</html>
