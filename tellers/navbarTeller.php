<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" type="" href="..\stylesheet\navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
</head>
<body>

<div class="nbf_navbar-container">
    <div class="nbf_navbar-left">
        <a href="#"><i class="fas fa-home" style="font-size:20px"></i> Home</a>
    </div>
    <div class="nbf_navbar-middle">
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-user"></i> Deposit</button>
            <div class="nbf_dropdown-content">
                <a href="#" id="openDepositBtn">Make a Deposit</a>
            </div>
        </div>
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fa fa-cogs"></i> Withdrawal</button>
            <div class="nbf_dropdown-content">
                <a href="#" id="openWithdrawalPopupBtn">Make a Withdrawal</a>
            </div>
        </div>
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-chart-line"></i> Accounting</button>
            <div class="nbf_dropdown-content">
                <a href="#" id="openAccountingBtn">Open Accounting</a>
            </div>
        </div>

        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-chart-line"></i> Reports</button>
            <div class="nbf_dropdown-content">
                <a href="\meisuedisonEnt\tellers\balancing.php">Balancing</a>
                <a href="#">Download Reports</a>
            </div>
        </div>
    </div>
    <div class="nbf_navbar-right">
        <div class="nbf_search-container">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class="fas fa-search" style="color: blue;"></i></button>
        </div>
        <div class="nbf_profile-dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-user" style="font-size:13px"></i>Teller</button>
            <div class="nbf_dropdown-content">
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="#" id="logoutBtn">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/meisuedisonEnt/tellers/deposit.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/meisuedisonEnt/tellers/withdrawals.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/meisuedisonEnt/tellers/accounting.php'; ?>

</body>
</html>
