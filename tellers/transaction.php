<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal</title>
    <link rel="stylesheet" href="\meisuedisonEnt\stylesheet\transaction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
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
<script src="/meisuedisonEnt/javascript/transaction.js" defer></script>
</body>
</html>
