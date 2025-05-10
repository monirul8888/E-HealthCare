<?php
include 'connect.php';
session_start();
$errorMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dEmail = $_POST['dEmail'];
    $dPassword = $_POST['dPassword'];
    $stmt = $connection->prepare("SELECT dID, dPassword FROM doctors WHERE dEmail = ?");
    $stmt->bind_param("s", $dEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($dPassword === $row['dPassword']) { 
            $_SESSION['dID'] = $row['dID'];
            header("Location: docInfo.php");
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
