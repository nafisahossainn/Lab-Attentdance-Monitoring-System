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
    <link rel="stylesheet" href="css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Student Panel</title>
</head>

<body>
    <section id="sidebar">
        <a href="/dashboard.php" class="brand">
            <i class='bx bx-code-alt'></i>
            <span class="text">Student Area</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class='bx bxs-user'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-help-circle'></i>
                    <span class="text">Help</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bx-log-out'></i>
                    <span class="text">LogOut</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content">

        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-ilnk">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">2</span>
            </a>
            <a href="/profile.php" class="profile">
                <img src="img/profile.jpeg">
            </a>
        </nav>

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bxs-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <a href="enrolled_labs.php">
                        <div class="box-info-content">
                            <i class='bx bx-desktop'></i>
                            <span class="text">
                                <p>Show</p>
                                <h3>Enrolled Labs</h3>
                            </span>
                        </div>
                    </a>
                </li>
            
                <li>
                    <a href="attendance.php">
                        <div class="box-info-content">
                            <i class='bx bxs-calendar-check'></i>
                            <span class="text">
                                <p>Show</p>
                                <h3>Attendance Details</h3>
                            </span>
                        </div>
                    </a>
                </li>

                <!--<li>-->
                <!--    <i class='bx bxs-analyse'></i>-->
                <!--    <span class="text">-->
                <!--        <p>Show</p>-->
                <!--        <h3>Total Attendance</h3>-->
                <!--    </span>-->
                <!--</li>-->
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Activity</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Date Of Labs</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="img/programming.png">
                                    <p>Object Oriented Programming</p>
                                </td>
                                <td>
                                    <p>30-05-2025</p>
                                </td>
                                <td><span class="status completed">Attended</span></td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="img/operativesystem.png">
                                    <p>Operating System</p>
                                </td>
                                <td>
                                    <p>26-05-2025</p>
                                </td>
                                <td><span class="status completed">Attended</span></td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="img/programming.png">
                                    <p>Object Oriented Programming</p>
                                </td>
                                <td>
                                    <p>23-05-2025</p>
                                </td>
                                <td><span class="status incompleted">Not Attended</span></td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="img/operativesystem.png">
                                    <p>Operating System</p>
                                </td>
                                <td>
                                    <p>19-05-2025</p>
                                </td>
                                <td><span class="status completed">Attended</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>

    <script src="js/script.js"></script>
</body>

</html>