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

    // File upload handling
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileError = $_FILES['file']['error'];
        $uploadDir = __DIR__ . '/uploads/'; // Absolute path to the uploads folder
        $filePath = $uploadDir . basename($fileName);

        // Ensure uploads folder exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create uploads folder with permissions
        }

        if ($fileError === 0) {
            if (move_uploaded_file($fileTmpName, $filePath)) {
                echo "File uploaded successfully: " . htmlspecialchars($filePath);

                // Prepare SQL query for inserting data into the database
                $stmt = $connection->prepare("INSERT INTO patients (pName, pEmail, pNumber, date, gender, medicalHistory, department, address, pPassword, file) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                // Bind parameters: "ssssssssss" for string + file path as last parameter
                $stmt->bind_param("ssssssssss", $pName, $pEmail, $pNumber, $date, $gender, $history, $department, $address, $pPassword, $filePath);

                // Execute the query and check for success
                if ($stmt->execute()) {
                    header("Location: home.php"); // Redirect to a success page (or wherever you'd like)
                    exit();
                } else {
                    $errorMessage = "There was an error during registration. Please try again.";
                }
            } else {
                $errorMessage = "Error moving uploaded file.";
            }
        } else {
            $errorMessage = "File upload error: $fileError";
        }
    } else {
        // Handle case where no file is uploaded (optional based on your requirements)
        $stmt = $connection->prepare("INSERT INTO patients (pName, pEmail, pNumber, date, gender, medicalHistory, department, address, pPassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Bind parameters for the database query
        $stmt->bind_param("sssssssss", $pName, $pEmail, $pNumber, $date, $gender, $history, $department, $address, $pPassword);

        // Execute the query and check for success
        if ($stmt->execute()) {
            header("Location: home.php"); // Redirect to a success page (or wherever you'd like)
            exit();
        } else {
            $errorMessage = "There was an error during registration. Please try again.";
        }
    }
    $stmt->close();
}
?>
