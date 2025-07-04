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
    <title>Attendance Details</title>
    <link rel="stylesheet" type="text/css" href="css/attendance.css">
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
        <div class="title">Attendance Details</div>


        <div class="info-section">
            <div class="info-item">
                <strong>Subject:</strong> <span>Operating System</span>
            </div>
            <div class="info-item">
                <strong>Code:</strong> <span>PCC-CS502</span>
            </div>
            <div class="info-item">
                <span class="attendance-percentage" id="attendancePercentageMath">Attended: 0%</span>
            </div>
            <div class="info-item">
                <select class="form-select" id="attendanceDropdownMath" onchange="updateAttendance('Math')"></select>
            </div>
        </div>
        <div class="progress-container">
            <div class="progress w-100">
                <div id="progressBarMath" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div id="attendanceDetailsMath" class="attendance-list" style="display: none;">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Attendance Status</th>
                    </tr>
                </thead>
                <tbody id="attendanceTableBodyMath"></tbody>
            </table>
        </div>


        <div class="info-section">
            <div class="info-item">
                <strong>Subject:</strong> <span>Object Oriented Programming</span>
            </div>
            <div class="info-item">
                <strong>Code:</strong> <span>PCC-CS503</span>
            </div>
            <div class="info-item">
                <span class="attendance-percentage" id="attendancePercentagePhysics">Attended: 0%</span>
            </div>
            <div class="info-item">
                <select class="form-select" id="attendanceDropdownPhysics" onchange="updateAttendance('Physics')"></select>
            </div>
        </div>
        <div class="progress-container">
            <div class="progress w-100">
                <div id="progressBarPhysics" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div id="attendanceDetailsPhysics" class="attendance-list" style="display: none;">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Attendance Status</th>
                    </tr>
                </thead>
                <tbody id="attendanceTableBodyPhysics"></tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/attendance.js"></script>

</body>

</html>