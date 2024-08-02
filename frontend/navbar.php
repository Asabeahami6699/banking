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
            <button class="nbf_dropbtn"><i class="fas fa-user"></i> Users</button>
            <div class="nbf_dropdown-content">
                <a href="#">User Management</a>
                <div class="nbf_submenu-container">
                    <a href="#" class="nbf_submenu-toggle">Add New User</a>
                    <div class="nbf_submenu">
                        <a href="#">Admin</a>
                        <a href="#">Regular User</a>
                    </div>
                </div>
                <div class="nbf_submenu-container">
                    <a href="#" class="nbf_submenu-toggle">List Users</a>
                    <div class="nbf_submenu">
                        <a href="#">Active Users</a>
                        <a href="#">Inactive Users</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fa fa-cogs"></i> Settings</button>
            <div class="nbf_dropdown-content">
                <a href="#">General Settings</a>
                <a href="#">Profile Settings</a>
            </div>
        </div>
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-chart-line"></i> Reports</button>
            <div class="nbf_dropdown-content">
                <a href="#">User Reports</a>
                <a href="#">Sales Reports</a>
            </div>
        </div>
    </div>
    <div class="nbf_navbar-right">
        <div class="nbf_search-container">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class="fas fa-search" style="color: blue;"></i></button>
        </div>
        <div class="nbf_profile-dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-user" style="font-size:13px"></i> Admin</button>
            <div class="nbf_dropdown-content">
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="#" id="logoutBtn">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="submenu_nav.js"></script>
<script src="logout.js"></script>
</body>
</html>
