<?php
include 'connect.php';
session_start();
$errorMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminEmail = $_POST['pEmail'];
    $adminPassword = $_POST['pPassword'];
    $stmt = $connection->prepare("SELECT adminId, adminPassword FROM admin WHERE adminEmail = ?");
    $stmt->bind_param("s", $adminEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($adminPassword === $row['adminPassword']) { 
            $_SESSION['adminId'] = $row['adminId'];  
            header("Location: adminInformation.php");
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
