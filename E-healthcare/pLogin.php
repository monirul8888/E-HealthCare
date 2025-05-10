<?php
include 'connect.php';
session_start();
$errorMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pEmail = $_POST['pEmail'];
    $pPassword = $_POST['pPassword'];
    $stmt = $connection->prepare("SELECT pID, pPassword FROM patients WHERE pEmail = ?");
    $stmt->bind_param("s", $pEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($pPassword === $row['pPassword']) { 
            $_SESSION['pID'] = $row['pID'];
            header("Location: pInfo.php");
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
