<?php
session_start();


if (isset($_SESSION['user_id'])) {
    
    header("Location: dashboard.php");
    exit;
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $username);
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();

                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        header("Location: dashboard.php");
                        exit;
                    } else {
                        $_SESSION['error'] = "Invalid password.";
                    }
                } else {
                    $_SESSION['error'] = "Invalid username or password.";
                }
            } else {
                $_SESSION['error'] = "Execution failed: " . $stmt->error;
            }
        } else {
            $_SESSION['error'] = "Query preparation failed: " . $conn->error;
        }
    } else {
        $_SESSION['error'] = "Please fill in both fields.";
    }
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login Page</title>
    <style>
        body {
            /*background: linear-gradient(to bottom right, #4e54c8, #8f94fb);*/
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #333;
            
            background-image:url(img/bg.jpg);
            background-repeat:no-repeat;
            background-size:cover;
            background-position:center;
            position:relative;
            z-index:9;
            overflow:hidden;
            /*height: 100vh;*/
        }
        .login-container {
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-header h2 {
            margin: 0;
            font-weight: bold;
            color: #4e54c8;
        }
        .form-check-label {
            font-size: 14px;
        }
        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }
        .forgot-password a {
            color: #4e54c8;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #4e54c8;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .btn-login:hover {
            background-color: #3b43a3;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="POST">
            <div class="login-header">
                <h2>Login</h2>
            </div>
           
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo '<div class="error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']); 
            }
            ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
        </form>
    </div>
</body>
</html>
