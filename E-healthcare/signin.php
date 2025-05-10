<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | E-Health Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">
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
                margin-top:50px;
                padding-top: 30px;
            }

        .content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }

        .login-options {
            background-color: #fff;
            padding: 50px 40px;
            border-radius: 20px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .login-options h2 {
            margin-bottom: 40px;
            color: #333;
            font-size: 26px;
        }

        .login-options button {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 20px 0;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            background-color:rgb(52, 8, 153);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        .login-options button:hover {
            background-color:rgb(14, 190, 23);
            transform: translateY(-2px);
        }

        .login-options a {
            text-decoration: none;
            color: white;
            display: block;
        }

        @media (max-width: 600px) {
            .login-options {
                padding: 30px 20px;
            }

            .nav-links {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-links a {
                margin: 6px 8px;
            }
        }
    </style>
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
        <div class="login-options">
            <h2>Choose Login Type</h2>
            <button><a href="login.php">Patient Login</a></button>
            <button><a href="login.php">Admin Login</a></button>
            <button><a href="login_d.php">Doctor Login</a></button>
        </div>
    </div>

    <div class="footer">
        &copy; 2024 E-Health Care. All Rights Reserved.
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
