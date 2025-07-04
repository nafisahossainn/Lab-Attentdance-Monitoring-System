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
    <title>Student Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>

    <div class="head">
        
        <a href="dashboard.php">
            <button class="btn">
                <i class='bx bxs-home'></i> Dashboard
            </button>
        </a>
    </div>

    <div class="profile-container">
        <div class="left">
            <img src="img/profile.jpeg" alt="user" class="profile-img">
            <h4>NAFISA HOSSAIN</h4>
        </div>

        <div class="right">
            <div class="info">
                <h3>Student Basic Details</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Institute Name</h4>
                        <p>Budge Budge Institute of Technology</p>
                    </div>

                    <div class="data">
                        <h4>Course Name</h4>
                        <p>Bachelor of Technology in Information Technology</p>
                    </div>

                    <div class="data">
                        <h4>Semester</h4>
                        <p>8th</p>
                    </div>

                    <div class="data">
                        <h4>Roll Number</h4>
                        <p>27600222019</p>
                    </div>

                    <div class="data">
                        <h4>Registration Number</h4>
                        <p>222760120543 (2022-2023)</p>
                    </div>

                    <div class="data">
                        <h4>Email Id</h4>
                        <p>nafisahossain1211@gmail.com</p>
                    </div>

                    <div class="data">
                        <h4>Date Of Birth</h4>
                        <p>12/11/2001</p>
                    </div>
                    <div class="data">
                        <h4>Phone No.</h4></h4>
                        <p>9002840964</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
