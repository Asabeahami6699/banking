
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="\meisuedisonEnt\stylesheet\register.css">
</head>
<body>
    

    <!-- Popup Form -->
    <div id="popupForm" class="popup-overlay">
        <div class="popup-content">
            <span class="close-btn" id="closeFormBtn">&times;</span>
            <h2>User Registration</h2>
            <form id="userRegistrationForm" method="post" action="\meisuedisonEnt\backend\register_user.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>

                <label for="role">Role:</label>
                <select id="role" name="role" required onchange="toggleRoleFields()">
                    <option value="admin">Admin</option>
                    <option value="backOfficer">Back Officer</option>
                    <option value="audit">Audit</option>
                    <option value="customer_service">Customer Service</option>
                    <option value="teller">Teller</option>
                </select>

                <div id="branchField" style="display: none;">
                    <label for="branch_name">Branch Name:</label>
                    <select id="branch_name" name="branch_name" onchange="updateTellerTypes()">
                        <option value="aiyinasi">Aiyinasi</option>
                        <option value="bogoso">Bogoso</option>
                        <option value="prestea">Prestea</option>
                    </select>
                </div>

                <div id="tellerField" style="display: none;">
                    <label for="teller_type">Teller Type:</label>
                    <select id="teller_type" name="teller_type">
                        <!-- Options will be dynamically updated based on the selected branch -->
                    </select>
                </div>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>

  
    <script src="\meisuedisonEnt\javascript\register.js"></script>
</body>
</html>


