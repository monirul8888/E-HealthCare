<?php
include 'connect.php';

// Define error message variable
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect the form data
    $pName = $_POST['pName'];
    $pEmail = $_POST['pEmail'];
    $pNumber = $_POST['pNumber'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $history = isset($_POST['history']) && is_array($_POST['history']) ? implode(", ", $_POST['history']) : ''; // Check if it's an array before imploding
    $department = $_POST['department'];
    $address = $_POST['address'];
    $pPassword = $_POST['pPassword'];

    // Prepare SQL query for inserting data into the database
    $stmt = $connection->prepare("INSERT INTO patients (pName, pEmail, pNumber, date, gender, medicalHistory, department, address, pPassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Use "ssssssss" for string parameters, and ensure it matches the number of parameters in the query
    $stmt->bind_param("sssssssss", $pName, $pEmail, $pNumber, $date, $gender, $history, $department, $address, $pPassword);

    // Execute the query and check for success
    if ($stmt->execute()) {
        header("Location: login.php"); // Redirect to a success page (or wherever you'd like)
        exit();
    } else {
        $errorMessage = "There was an error during registration. Please try again.";
    }

    $stmt->close();
}
?>
