<?php
include 'connect.php';
session_start();

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pEmail = $_POST['pEmail'];
    $pPassword = $_POST['pPassword'];

    // Prepared statement to fetch user details
    $stmt = $connection->prepare("SELECT adminId,adminName,adminPhone,adminEmail,designation,joinDate FROM admin WHERE adminEmail = ?");
    $stmt->bind_param("s", $adminEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($pPassword === $row['pPassword']) { // For testing only, plain text
            $_SESSION['adminId'] = $row['adminId'];  // Store pID in session for later use
            header("Location: adminInfo.php");
            exit();
        } else {
            $errorMessage = "Incorrect password.";
        }
    } else {
        $errorMessage = "Email not registered.";
    }

    $stmt->close();
}
?>
