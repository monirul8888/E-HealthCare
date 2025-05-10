<?php
// Include necessary files for database connection and processing
include 'connect.php';
include 'adminInsert.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<div class="container">
        <div class="header">
            <h2>Welcome To E-Health Care</h2>
            <div class="nav-links">
                <a href="home.php">Home</a>
                <a href="doctors.php">Doctors</a>
                <a href="services.php">Services</a>
                <a href="signup.php">Sign Up</a>
                <a href="signin.php">Log In</a>
                <a href="about.php">About Us</a>

                <!-- Search Toggle and Bar -->
                <div class="search-section">
                    <button id="search-toggle">🔍</button>
                    <div id="search-bar" class="search-bar">
                        <input type="text" id="search-input" placeholder="Search...">
                        <button id="search-btn">Go</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="form">
                <form action="adminForm.php" method="POST">
                    <h2>Admin Registration Form</h2>
                    <table>
                        <tr>
                            <th>
                                <label for="adminName">NAME</label>
                            </th>
                            <td><input type="text" name="adminName" id="adminName" required></td>
                        </tr>
                        <tr>
                            <th>
                                <label for="adminPhone">PHONE</label>
                            </th>
                            <td><input type="text" name="adminPhone" id="adminPhone" required></td>
                        </tr>
                        <tr>
                            <th>
                                <label for="adminEmail">EMAIL</label>
                            </th>
                            <td><input type="email" name="adminEmail" id="adminEmail" required></td>
                        </tr>
                        <tr>
                            <th><label for="designation">DESIGNATION</label></th>
                            <td><input type="text" name="designation" id="designation" required></td>
                        </tr>
                        <tr>
                            <th><label for="joinDate">JOIN DATE</label></th>
                            <td><input type="date" name="joinDate" id="joinDate" required></td>
                        </tr>
                        <tr>
                            <th><label for="adminPassword">PASSWORD</label></th>
                            <td><input type="password" name="adminPassword" id="adminPassword" required></td>
                        </tr>
                        <tr>
                            <th><input type="submit" name="submit" value="Register"></th>
                            <td><input type="reset" value="Reset"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="footer">
            &copy; 2024 E-Health Care. All Rights Reserved.
        </div>
    </div>

    <script>
        const toggle = document.getElementById('search-toggle');
        const searchBar = document.getElementById('search-bar');

        toggle.addEventListener('click', () => {
            searchBar.classList.toggle('active');
        });

        const searchInput = document.getElementById('search-input');
        const searchBtn = document.getElementById('search-btn');

        searchBtn.addEventListener('click', () => {
            const query = searchInput.value.trim().toLowerCase();

            switch (query) {
                case "home":
                    window.location.href = "home.php";
                    break;
                case "service":
                case "services":
                    window.location.href = "services.php";
                    break;
                case "doctors":
                    window.location.href = "doctors.php";
                    break;
                case "about":
                    window.location.href = "about.php";
                    break;
                default:
                    alert("Page not found. Try typing: home, service, doctors, or about.");
            }
        });
    </script>
</body>
</html>
