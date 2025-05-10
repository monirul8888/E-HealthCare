<?php
include 'connect.php';
$doctors = [];
$sql = "SELECT * FROM doctors";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
}
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Doctor Information</title>
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

        img {
            width: 80px;
            height: auto;
            border-radius: 5px;
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
        <h1>All Doctor Information</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Degree</th>
                    <th>Specialization</th>
                    <th>Designation</th>
                    <th>Hospital</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($doctors)): ?>
                    <?php foreach ($doctors as $doctor): ?>
                        <tr>
                            <td><?= htmlspecialchars($doctor['dID']) ?></td>
                            <td><?= htmlspecialchars($doctor['dName']) ?></td>
                            <td><?= htmlspecialchars($doctor['dEmail']) ?></td>
                            <td><?= htmlspecialchars($doctor['degree']) ?></td>
                            <td><?= htmlspecialchars($doctor['specialization']) ?></td>
                            <td><?= htmlspecialchars($doctor['designation']) ?></td>
                            <td><?= htmlspecialchars($doctor['hospital']) ?></td>
                            <td>
                                <?php if (!empty($doctor['dImage'])): ?>
                                    <img src="uploads/<?= htmlspecialchars($doctor['dImage']) ?>" alt="Doctor Photo">
                                <?php else: ?>
                                    No image
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No doctor records found.</td>
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
