<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-card h3 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #2980b9;
        }

        .btn-login {
            background: #2980b9;
            color: white;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #1f6391;
        }

        @media(max-width: 768px) {
            .login-card {
                margin: 0 1rem;
            }
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3>Admin Login</h3>
    <form id="loginForm" method="POST" action="admin.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="mb-3">
            <label for="admin_email" class="form-label">Admin Email</label>
            <input type="email" class="form-control" name="admin_email" id="admin_email" required>
        </div>
        <div class="mb-3">
            <label for="password_hash" class="form-label">Password</label>
            <input type="password" class="form-control" name="password_hash" id="password_hash" required>
        </div>
        <button type="submit" class="btn btn-login w-100">Login</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optional simple jQuery feedback -->
<script>
$(document).ready(function(){
    $("#loginForm").on("submit", function(){
        $(".btn-login").html("Logging in...");
    });
});
</script>

</body>
</html>
