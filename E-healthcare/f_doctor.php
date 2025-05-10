<?php
include 'connect.php';

$specialization = isset($_GET['specialization']) ? $_GET['specialization'] : '';

if ($specialization) {
    $stmt = $connection->prepare("SELECT dID, dName, dImage, degree, specialization, hospital FROM doctors WHERE specialization = ?");
    $stmt->bind_param("s", $specialization);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // fallback if no specialization provided
    $result = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($specialization); ?> Doctors | E-Health Care</title>
    <link rel="stylesheet" href="doctors.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">


    <head>
        <!-- your existing meta and link tags -->
        <style>
            .content {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .content h3 {
                width: 100%;
                text-align: center;
                font-size: 28px;
                margin-bottom: 20px;
                color: #2c3e50;
                font-family: Arial, sans-serif;
                border-bottom: 2px solid #3498db;
                padding-bottom: 8px;
            }

            .doctors-wrapper {
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .doctors-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
                max-width: 1200px;
            }

            .doctor-card {
                width: 250px;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                background-color: #fff;
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

            /* Make doctor cards stand out */
            .doctor-card {
                background: #fff !important;
                box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25) !important;
                border-radius: 12px !important;
            }

            /* Appointment button default color */
            .doctor-card .appt-btn {
                background-color: rgb(89, 236, 150) !important;
                /* green button */
                color: #fff !important;
            }

            /* Appointment button hover color */
            .doctor-card .appt-btn:hover {
                background-color: #8775eb !important;
                /* purple on hover */
                color: #fff !important;
            }

            .doctor-card .specialization {
                color: orangered !important;
                font-weight: 700;
            }
        </style>

    </head>

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
            <h3>Doctors Specialized in <?php echo htmlspecialchars($specialization); ?></h3>
            <div class="doctors-wrapper">
                <div class="doctors-container">
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($doc = $result->fetch_assoc()): ?>
                            <div class="doctor-card">
                                <img src="<?php echo htmlspecialchars($doc['dImage']); ?>" alt="<?php echo htmlspecialchars($doc['dName']); ?>">
                                <h4><?php echo htmlspecialchars($doc['dName']); ?></h4>
                                <p class="degree"><?php echo htmlspecialchars($doc['degree']); ?></p>
                                <p class="specialization"><?php echo htmlspecialchars($doc['specialization']); ?></p>
                                <p class="hospital"><?php echo htmlspecialchars($doc['hospital']); ?></p>
                                <button class="appt-btn" type="button" onclick="location.href='appointment.php?dID=<?php echo $doc['dID']; ?>'">
                                    Book Appointment
                                </button>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No doctors found for this specialization.</p>
                    <?php endif; ?>
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