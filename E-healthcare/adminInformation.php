<?php
include 'connect.php';
session_start();

// Check if the user is logged in (assuming a session is used to track the logged-in user)
if (!isset($_SESSION['adminId'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

$adminId = $_SESSION['adminId'];  // Get the logged-in patient's ID

// Prepare the SQL query to fetch the patient data from the database
$stmt = $connection->prepare("SELECT adminName,joinDate,designation,adminPhone,adminEmail FROM admin WHERE adminId = ?");
$stmt->bind_param("i", $adminId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // If the patient is found, fetch and display their data
    $row = $result->fetch_assoc();
    $adminName = $row['adminName'];
    $adminEmail = $row['adminEmail'];
    $adminPhone = $row['adminPhone'];
    $joinDate = $row['joinDate'];
    $designation = $row['designation'];
    // $medical_history = $row['medicalHistory'];
    // $department = $row['department'];
    // $address = $row['address'];

    // Display the patient's data
    echo '<div class="content">';
    echo '<div class="pInfo">';

    echo "<h2>Welcome, " . htmlspecialchars($adminName) . "</h2>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($adminName) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($adminEmail) . "</p>";
    echo "<p><strong>Phone Number:</strong> " . htmlspecialchars($adminPhone) . "</p>";
    echo "<p><strong>Join Date:</strong> " . htmlspecialchars($joinDate) . "</p>";
    echo "<p><strong>Designation:</strong> " . htmlspecialchars($designation) . "</p>";
    //echo "<p><strong>Medical History:</strong> " . htmlspecialchars($medical_history) . "</p>";
    // echo "<p><strong>Department:</strong> " . htmlspecialchars($department) . "</p>";
    // echo "<p><strong>Address:</strong> " . htmlspecialchars($address) . "</p>";

    echo "<button class=\"add\"><a href=\"allPatInfo.php\">Patients Info</a></button>";
    echo "<button class=\"add\"><a href=\"all_doc_info.php\">Doctors Info</a></button>";
    echo "<button class=\"add\"><a href=\"appointment_info.php\">Appointment Info</a></button>";
    echo "<br><br>";
    echo "<button class=\"add-doctor\"><a href=\"doctorSignup.php\">Add Doctor</a></button>";






    echo '</div>';
    echo '</div>';
} else {
    // If no record is found for the user
    echo "<p>No record found for this user.</p>";
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="pInfo.css">
    <link rel="stylesheet" href="home.css">

    <style>
         .add{
            margin-top: 40px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-right: 10px;
            margin-left: 10px;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #45a049;
        }

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

        button.add-doctor {
            background-color:rgb(57, 108, 161);
            /* blue color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 5px;
            margin-right: 30px;
        }

        button.add-doctor:hover {
            background-color: #0056b3;
            /* darker blue on hover */
        }

        button.add-doctor a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
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