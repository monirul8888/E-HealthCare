<?php
session_start();
include 'connect.php';

if (!isset($_POST['confirm_appointment'])) {
    header("Location: appointment.php");
    exit();
}

unset($_SESSION['payment_done']);  // Reset payment flag

$pID = $_SESSION['pID'];
$dID = $_SESSION['dID'];

// Fetch patient name
$stmtP = $connection->prepare("SELECT pName FROM patients WHERE pID = ?");
$stmtP->bind_param("i", $pID);
$stmtP->execute();
$resultP = $stmtP->get_result();
$patient = $resultP->fetch_assoc();
$pName = $patient['pName'];
$stmtP->close();

// Fetch doctor name
$stmtD = $connection->prepare("SELECT dName FROM doctors WHERE dID = ?");
$stmtD->bind_param("i", $dID);
$stmtD->execute();
$resultD = $stmtD->get_result();
$doctor = $resultD->fetch_assoc();
$dName = $doctor['dName'];
$stmtD->close();

// Find an available schedule (serial not yet assigned)
$scheduleQuery = "
    SELECT * FROM schedule s
    WHERE NOT EXISTS (
        SELECT 1 FROM appointment a WHERE a.serial = s.id
    )
    LIMIT 1
";

$scheduleResult = $connection->query($scheduleQuery);
$schedule = $scheduleResult->fetch_assoc();

if (!$schedule) {
    die("<h2 style='color:red; text-align:center;'>No available schedule found. Please try again later.</h2><a href='home.php'>Back to Home</a>");
}

// Insert appointment record
$insertStmt = $connection->prepare("
    INSERT INTO appointment (serial, p_name, d_name, date, time, link)
    VALUES (?, ?, ?, ?, ?, ?)
");
$insertStmt->bind_param(
    "isssss",
    $schedule['id'],
    $pName,
    $dName,
    $schedule['date'],
    $schedule['time'],
    $schedule['link']
);

if (!$insertStmt->execute()) {
    die("<h2 style='color:red; text-align:center;'>Failed to save appointment. Please contact support.</h2><a href='home.php'>Back to Home</a>");
}

$insertStmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Token | E-Health Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">
    <style>
        .token-card {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 700px;
            margin: 40px auto;
        }

        .token-card h2 {
            font-size: 2rem;
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            width: 25%;
            white-space: nowrap;
        }

        table td {
            width: 75%;
            word-wrap: break-word;
        }

        .nav-links a {
            margin-right: 10px;
        }

        body, html {
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
        <div class="token-card">
            <h2>Your Appointment Confirmed!</h2>
            <table>
                <tr>
                    <th>Patient Name</th>
                    <td><?php echo htmlspecialchars($pName); ?></td>
                </tr>
                <tr>
                    <th>Doctor Name</th>
                    <td><?php echo htmlspecialchars($dName); ?></td>
                </tr>
                <tr>
                    <th>Serial (ID)</th>
                    <td><?php echo htmlspecialchars($schedule['id']); ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?php echo htmlspecialchars($schedule['date']); ?></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td><?php echo htmlspecialchars($schedule['time']); ?></td>
                </tr>
                <tr>
                    <th>Link</th>
                    <td><a href="<?php echo htmlspecialchars($schedule['link']); ?>" target="_blank">Join Meeting</a></td>
                </tr>
            </table>

            <a href='home.php'>Back to Home</a>
        </div>
    </div>

    <div class="footer">
        &copy; 2024 E-Health Care. All Rights Reserved.
    </div>
</div>
</body>
</html>
