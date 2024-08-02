<?php
include $_SERVER["DOCUMENT_ROOT"].'\meisuedisonEnt\db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];
    $branch_name = isset($_POST['branch_name']) ? $_POST['branch_name'] : NULL;
    $teller_type = isset($_POST['teller_type']) ? $_POST['teller_type'] : NULL;


    $sql = "INSERT INTO Users(username, password, first_name, last_name, role, branch_name, teller_type)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss", $username, $password, $first_name, $last_name, $role, $branch_name, $teller_type);

        if ($stmt->execute()) {
            echo "<script>alert('User registered successfully.');</script>";
            header("Location:\meisuedisonEnt\admin\Admin_dashboard.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

