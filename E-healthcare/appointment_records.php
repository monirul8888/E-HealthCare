<?php
session_start();
include 'connect.php';

// Check if patient is logged in
if (!isset($_SESSION['pID'])) {
    die("<h2>Please log in to view your appointments.</h2><a href='signin.php'>Log In</a>");
}

$pID = $_SESSION['pID'];

// Get patient name from the database
$stmtP = $connection->prepare("SELECT pName FROM patients WHERE pID = ?");
$stmtP->bind_param("i", $pID);
$stmtP->execute();
$resultP = $stmtP->get_result();
if ($resultP->num_rows === 0) {
    die("<h2>Patient not found.</h2><a href='home.php'>Back to Home</a>");
}
$patient = $resultP->fetch_assoc();
$pName = $patient['pName'];
$stmtP->close();

// Get only this patient's appointments
$appointments = [];
$stmtA = $connection->prepare("SELECT * FROM appointment WHERE p_name = ? ORDER BY id DESC");
$stmtA->bind_param("s", $pName);
$stmtA->execute();
$resultA = $stmtA->get_result();

if ($resultA->num_rows > 0) {
    while ($row = $resultA->fetch_assoc()) {
        $appointments[] = $row;
    }
}
$stmtA->close();
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="pInfo.css">

    <style>
        table {
            margin: 0 auto;
            margin-top: 50px;
            border-collapse: collapse;
            width: 80%;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
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
        </div>
    </div>

    <div class="content">
        <h1>My Appointments (<?php echo htmlspecialchars($pName); ?>)</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Serial (ID)</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Meeting Link</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($appointments)): ?>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?= htmlspecialchars($appointment['serial']) ?></td>
                            <td><?= htmlspecialchars($appointment['d_name']) ?></td>
                            <td><?= htmlspecialchars($appointment['date']) ?></td>
                            <td><?= htmlspecialchars($appointment['time']) ?></td>
                            <td>
                                <a href="<?= htmlspecialchars($appointment['link']) ?>" target="_blank">
                                    Join Meeting
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No appointment records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; 2024 E-Health Care. All Rights Reserved.
    </div>
</div>
</body>
</html>