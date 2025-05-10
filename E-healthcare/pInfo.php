<?php
include 'connect.php';
session_start();

// Check if the user is logged in (assuming a session is used to track the logged-in user)
if (!isset($_SESSION['pID'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

$pID = $_SESSION['pID'];  // Get the logged-in patient's ID

// Prepare the SQL query to fetch the patient data from the database
$stmt = $connection->prepare("SELECT pName, pEmail, pNumber, date, gender, medicalHistory, department, address FROM patients WHERE pID = ?");
$stmt->bind_param("i", $pID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // If the patient is found, fetch and display their data
    $row = $result->fetch_assoc();
    $pName = $row['pName'];
    $pEmail = $row['pEmail'];
    $pNumber = $row['pNumber'];
    $date_of_birth = $row['date'];
    $gender = $row['gender'];
    $medical_history = $row['medicalHistory'];
    $department = $row['department'];
    $address = $row['address'];

    // Display the patient's data
    echo '<div class="content">';
    echo '<div class="pInfo">';

    echo "<h2>Welcome, " . htmlspecialchars($pName) . "</h2>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($pName) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($pEmail) . "</p>";
    echo "<p><strong>Phone Number:</strong> " . htmlspecialchars($pNumber) . "</p>";
    echo "<p><strong>Date of Birth:</strong> " . htmlspecialchars($date_of_birth) . "</p>";
    echo "<p><strong>Gender:</strong> " . htmlspecialchars($gender) . "</p>";
    echo "<p><strong>Medical History:</strong> " . htmlspecialchars($medical_history) . "</p>";
    echo "<p><strong>Department:</strong> " . htmlspecialchars($department) . "</p>";
    echo "<p><strong>Address:</strong> " . htmlspecialchars($address) . "</p>";

    // Added buttons
    echo "<button><a href=\"message.php\">eHealthCare Messenger</a></button>";
    echo "<button style='margin-left: 10px;'><a href=\"appointment_records.php\">Appointment Record</a></button>";

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
    <title>Patient Information</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="pInfo.css">
    <link rel="stylesheet" href="home.css">

    <style>
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
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

        .nav-links a {
            margin-right: 10px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
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