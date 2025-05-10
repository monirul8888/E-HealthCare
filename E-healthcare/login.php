<?php
include 'connect.php';
include 'pLogin.php';
include 'adminLogin.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | E-Health Care</title>
    <link rel="stylesheet" href="login.css">
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
                margin-top: 0;
                padding-top: 30px;
            }

 <link rel="stylesheet" href="index.css">

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


        <!-- Content Section -->
        <div class="content">
            <div class="form">
                <h2>Sign In</h2>
                <form action="login.php" method="POST">
                    <?php if (!empty($errorMessage)) { ?>
                        <div class="error-message">
                            <?php echo htmlspecialchars($errorMessage); ?>
                        </div>
                    <?php } ?>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="pEmail" placeholder="Enter your email" required>
                    
                    <label for="password">Password</label>
                    <input type="password" id="password" name="pPassword" placeholder="Enter your password" required>
                    
                    <button type="submit">Login</button>
                    <p class="register-link">Don't have an account? <a href="signup.php">Sign up</a></p>
                </form>
            </div>
        </div>

        <!-- Footer Section -->
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
