<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Labs</title>
    <link rel="stylesheet" href="css/enrolledLabs.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <a href="dashboard.php">
        <div class="head">
            <button class="btn">
                <i class='bx bxs-home'></i> Dashboard
            </button>
        </div>
    </a>

    <div class="container">

        <div class="title">Enrolled Labs</div>

        <div class="info-line">
            <span><strong>Student Name:</strong>Nafisa Hossain</span>
            <span><strong>Roll Number:</strong> 27600222019</span>
        </div>

        <div class="table-container">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Subject Code</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Operating System</td>
                        <td>PCC-CS502</td>
                    </tr>
                    <tr>
                        <td>Object Oriented Programming</td>
                        <td>PCC-CS503</td>
                    </tr>
                    <!-- <tr>
                        <td>Mathematics</td>
                        <td>MATH103</td>
                    </tr> -->
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
