<?php
include 'connect.php';
session_start();

// Check if doctor ID is passed via GET and store in session
if (isset($_GET['dID'])) {
    $_SESSION['dID'] = $_GET['dID'];
}

// Check if patient is logged in
if (!isset($_SESSION['pID'])) {
    header("Location: signin.php");
    exit();
}

// Check if doctor is selected
if (!isset($_SESSION['dID'])) {
    echo "<p>No doctor selected. Please go back and choose a doctor.</p>";
    exit();
}

$pID = $_SESSION['pID'];
$dID = $_SESSION['dID'];

$message = ""; // Message to display

// Handle payment submission
if (isset($_POST['send_payment'])) {
    $ac_num = $_POST['ac_num'];
    $pin = $_POST['pin'];
    $amount = $_POST['amount'];

    // Validate amount
    if ($amount != 100) {
        $message = "<p style='color:red;'>Invalid amount. You must pay exactly 100 taka.</p>";
    } else {
        // Check account and pin in the database
        $stmt = $connection->prepare("SELECT * FROM payment WHERE ac_num = ? AND pin = ?");
        $stmt->bind_param("ii", $ac_num, $pin);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Payment successful
            $_SESSION['payment_done'] = true;
            $message = "<p style='color:green;'>Payment successful! You can now confirm your appointment.</p>";
        } else {
            $message = "<p style='color:red;'>Invalid account number or PIN. Please try again.</p>";
        }
        $stmt->close();
    }
}

// Fetch patient details
$stmtP = $connection->prepare("SELECT pName, pEmail, pNumber, gender, medicalHistory, department FROM patients WHERE pID = ?");
$stmtP->bind_param("i", $pID);
$stmtP->execute();
$resultP = $stmtP->get_result();

if ($resultP->num_rows > 0) {
    $patient = $resultP->fetch_assoc();
} else {
    echo "<p>Patient record not found.</p>";
    exit();
}
$stmtP->close();

// Fetch doctor details
$stmtD = $connection->prepare("SELECT dName FROM doctors WHERE dID = ?");
$stmtD->bind_param("i", $dID);
$stmtD->execute();
$resultD = $stmtD->get_result();

if ($resultD->num_rows > 0) {
    $doctor = $resultD->fetch_assoc();
} else {
    echo "<p>Doctor record not found.</p>";
    exit();
}
$stmtD->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment | E-Health Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">
    <style>
        .appointment-card {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 600px;
            margin: 40px auto;
        }
        .appointment-card h2 {
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
        .doctor-name {
            color: #007bff;
            font-weight: bold;
        }
        .payment-box {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .payment-box input {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
        }
        .appointment-card button {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .appointment-card button:hover {
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
                margin-top: 18px;
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
        <div class="appointment-card">
            <h2>Appointment</h2>

            <?php if (!empty($message)) echo $message; ?>

            <table>
                <tr>
                    <th>Doctor</th>
                    <td class="doctor-name"><?php echo htmlspecialchars($doctor['dName']); ?></td>
                </tr>
                <tr>
                    <th>Patient Name</th>
                    <td><?php echo htmlspecialchars($patient['pName']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($patient['pEmail']); ?></td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td><?php echo htmlspecialchars($patient['pNumber']); ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo htmlspecialchars($patient['gender']); ?></td>
                </tr>
                <tr>
                    <th>Medical History</th>
                    <td><?php echo htmlspecialchars($patient['medicalHistory']); ?></td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td><?php echo htmlspecialchars($patient['department']); ?></td>
                </tr>
            </table>

            <?php if (!isset($_SESSION['payment_done'])): ?>
            <form method="POST">
                <div class="payment-box">
                    <h3>VISA CARD</h3>
                    <input type="text" name="ac_num" placeholder="Account Number" required>
                    <input type="password" name="pin" placeholder="PIN" required>
                    <input type="number" name="amount" placeholder="Amount (must be 100 Taka)" required>
                    <button type="submit" name="send_payment">Send Payment</button>
                </div>
            </form>
            <?php endif; ?>

            <?php if (isset($_SESSION['payment_done'])): ?>
            <form action="token.php" method="POST" style="margin-top: 20px;">
                <input type="hidden" name="dID" value="<?php echo $dID; ?>">
                <input type="hidden" name="pID" value="<?php echo $pID; ?>">
                <button type="submit" name="confirm_appointment">Confirm Appointment</button>
            </form>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer">
        &copy; 2024 E-Health Care. All Rights Reserved.
    </div>
</div>
</body>
</html>
