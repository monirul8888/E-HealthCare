<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pName = $_POST['pName'];
    $pEmail = $_POST['pEmail'];
    $pNumber = $_POST['pNumber'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pPassword = $_POST['pPassword'];

    // Handle file upload
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    // Check if the file was uploaded without errors
    if ($fileError === 0) {
        $uploadDir = 'uploads/';
        $filePath = $uploadDir . basename($fileName);

        // Move the uploaded file to the "uploads" folder
        if (move_uploaded_file($fileTmpName, $filePath)) {
            // Insert into database
            $stmt = $connection->prepare("INSERT INTO patients1 (pName, pEmail, pNumber, date, gender, address, file, pPassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $pName, $pEmail, $pNumber, $date, $gender, $address, $filePath, $pPassword);
            
            if ($stmt->execute()) {
                echo "File uploaded and data saved successfully.";
            } else {
                echo "Database error: " . $connection->error;
            }
            $stmt->close();
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Error uploading file: $fileError";
    }
}
?>
