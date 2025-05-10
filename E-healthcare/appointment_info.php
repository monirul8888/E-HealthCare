<?php
include 'connect.php';
$appointments = [];
$sql = "SELECT * FROM appointment";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Appointment Information</title>
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
        <h1>All Appointment Information</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Serial (ID)</th>
                    <th>Patient Name</th>
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
                            <td><?= htmlspecialchars($appointment['p_name']) ?></td>
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
                        <td colspan="6">No appointment records found.</td>
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
