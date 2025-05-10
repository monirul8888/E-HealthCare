<?php
// Include the database connection file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $adminName = trim($_POST['adminName']);
    $adminPhone = trim($_POST['adminPhone']);
    $adminEmail = trim($_POST['adminEmail']);
    $designation = trim($_POST['designation']);
    $joinDate = $_POST['joinDate'];
    $adminPassword = trim($_POST['adminPassword']);

    // Validate input
    if (empty($adminName) || empty($adminPhone) || empty($adminEmail) || empty($designation) || empty($joinDate) || empty($adminPassword)) {
        echo "All fields are required.";
        exit;
    }



    // SQL query to insert data into the admin table
    $sql = "INSERT INTO admin (adminName, adminPhone, adminEmail, designation, joinDate, adminPassword)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    if ($stmt = $connection->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ssssss", $adminName, $adminPhone, $adminEmail, $designation, $joinDate, $adminPassword);

        if ($stmt->execute()) {
            header("Location: login.php"); // Redirect to a success page (or wherever you'd like)
            exit();
        }

        // Execute the statement
        if ($stmt->execute()) {
            echo "Admin registered successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $connection->error;
    }

    // Close the database connection
    $connection->close();
} else {
    echo "Invalid request method.";
}
?>
