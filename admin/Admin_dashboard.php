<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="\meisuedisonEnt\stylesheet\admin_dashboard.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#" id="openFormBtn">Users</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Reports</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="profile">
                <img src="profile.jpg" alt="Profile Picture">
                <span>Admin Name</span>
            </div>
        </div>
        <div class="content">
            <div class="stats">
                <div class="stat-item">
                    <h3>Users</h3>
                    <p>150</p>
                </div>
                <div class="stat-item">
                    <h3>Sales</h3>
                    <p>$1,200</p>
                </div>
                <div class="stat-item">
                    <h3>Orders</h3>
                    <p>45</p>
                </div>
            </div>
            <div class="table-container">
                <h2>Recent Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>User</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>Admin</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/meisuedisonEnt/admin/register.php"?>
    <script src="/javascript/admin_dashboard.js"></script>
</body>
</html>
