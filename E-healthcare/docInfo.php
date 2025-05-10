<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['dID'])) {
    header("Location: login.php");
    exit();
}

$dID = $_SESSION['dID'];

// Fetch doctor data according to your database table
$stmt = $connection->prepare("SELECT dName, dEmail, degree, specialization, designation, hospital, dImage FROM doctors WHERE dID = ?");
$stmt->bind_param("i", $dID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dName = $row['dName'];
    $dEmail = $row['dEmail'];
    $degree = $row['degree'];
    $specialization = $row['specialization'];
    $designation = $row['designation'];
    $hospital = $row['hospital'];
    $dImage = $row['dImage'];  // Path to doctor image
} else {
    echo "<p>No record found for this doctor.</p>";
    exit();
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Profile | E-Health Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="docInfo.css"> 
    <link rel="stylesheet" href="home.css">

    <style>
        .doc-card {
            background-color: #f9f9f9;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: 40px auto;
            text-align: center;
        }

        .doc-card img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid #4CAF50;
        }

        .doc-card p {
            font-size: 18px;
            margin: 8px 0;
        }

        .doc-card strong {
            color: #333;
        }

        .go-button {
            background-color:rgb(6, 188, 36);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
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

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #555;
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

        <!-- Doctor Info -->
        <div class="content">
            <div class="doc-card">
                <img src="<?php echo htmlspecialchars($dImage); ?>" alt="Doctor Photo">
                <h2>Dr. <?php echo htmlspecialchars($dName); ?></h2>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($dEmail); ?></p>
                <p><strong>Degree:</strong> <?php echo htmlspecialchars($degree); ?></p>
                <p><strong>Specialization:</strong> <?php echo htmlspecialchars($specialization); ?></p>
                <p><strong>Designation:</strong> <?php echo htmlspecialchars($designation); ?></p>
                <p><strong>Hospital:</strong> <?php echo htmlspecialchars($hospital); ?></p>

                <!-- New Button -->
                <a href="d_p_info.php" class="go-button">Appointment Details</a>
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
