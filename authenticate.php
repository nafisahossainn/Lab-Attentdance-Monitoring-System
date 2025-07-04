<?php
session_start();
require 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username or Password cannot be empty');</script>";
        exit;
    }

    
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id; 
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid username or password');</script>";
            header("Location: login.php");
            exit;
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
