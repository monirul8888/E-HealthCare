<?php
include 'connect.php';
include 'doctorInsert.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration | E-Health Care</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">
</head>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
    }

    .container {
        margin: 0 auto;
        padding: 0;
    }

    .header {
        margin-bottom: 10px;
    }

    .content {
        margin-top: 18px;
        padding-top: 30px;
    }
</style>

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
                <form action="doctorSignup.php" method="POST" enctype="multipart/form-data">
                    <h2>Doctor Registration Form</h2>
                    <table>
                        <tr>
                            <th><label for="dName">Full Name</label></th>
                            <td><input type="text" name="dName" id="dName" placeholder="Enter Full Name" required></td>
                        </tr>
                        <tr>
                            <th><label for="dEmail">Email</label></th>
                            <td><input type="email" name="dEmail" id="dEmail" placeholder="Enter Email" required></td>
                        </tr>
                        <tr>
                            <th><label for="dPassword">Password</label></th>
                            <td><input type="password" name="dPassword" id="dPassword" placeholder="Enter Password" required></td>
                        </tr>
                        <tr>
                            <th><label for="degree">Degrees</label></th>
                            <td><input type="text" name="degree" id="degree" placeholder="e.g., MBBS, MD" required></td>
                        </tr>
                        <tr>
                            <th><label for="specialization">Specialization</label></th>
                            <td><input type="text" name="specialization" id="specialization" placeholder="e.g., Cardiologist" required></td>
                        </tr>
                        <tr>
                            <th><label for="designation">Designation</label></th>
                            <td><input type="text" name="designation" id="designation" placeholder="e.g., Senior Consultant" required></td>
                        </tr>
                        <tr>
                            <th><label for="hospital">Hospital Name</label></th>
                            <td><input type="text" name="hospital" id="hospital" placeholder="e.g., Apollo Hospital" required></td>
                        </tr>
                        <tr>
                            <th><label for="dImage">Upload Profile Picture</label></th>
                            <td><input type="file" name="dImage" id="dImage" accept="image/*" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Register"></td>
                            <td><input type="reset" value="Reset"></td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>

        <!-- Footer -->
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