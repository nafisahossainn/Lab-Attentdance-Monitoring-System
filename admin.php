<?php
session_start();

// Database connection
require 'config.php';

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $admin_email = trim($_POST["admin_email"]);
    $password = $_POST["password_hash"]; // FIXED: use plain password from form

    // Prepare & bind
    $stmt = $conn->prepare("SELECT admin_id, admin_name, password_hash FROM admin_users WHERE username = ? AND admin_email = ?");
    $stmt->bind_param("ss", $username, $admin_email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check user found
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password_hash"])) {
            $_SESSION["admin_id"] = $row["admin_id"];
            $_SESSION["admin_name"] = $row["admin_name"];
            header("Location: admin_dashboard.php");
            exit;
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Invalid username or email.";
    }
}
?>
