<?php
include 'connect.php';

// Define error message variable
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $dName = $_POST['dName'];
    $dEmail = $_POST['dEmail'];
    $dPassword = $_POST['dPassword'];
    $degree = $_POST['degree'];
    $specialization = $_POST['specialization'];
    $designation = $_POST['designation'];
    $hospital = $_POST['hospital'];

    // Handle file upload
    $imageName = $_FILES['dImage']['name'];
    $imageTmp = $_FILES['dImage']['tmp_name'];
    $imageFolder = 'uploads/' . $imageName;

    // Optional: Validate file type and size (recommended)
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($_FILES['dImage']['type'], $allowedTypes)) {
        $errorMessage = "Invalid image type. Only JPG, JPEG, and PNG are allowed.";
    } else {
        if (move_uploaded_file($imageTmp, $imageFolder)) {
            // Insert into database
            $stmt = $connection->prepare("INSERT INTO doctors (dName, dEmail, dPassword, degree, specialization, designation, hospital, dImage) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $dName, $dEmail, $dPassword, $degree, $specialization, $designation, $hospital, $imageName);

            if ($stmt->execute()) {
                header("Location: login_d.php"); // Redirect on success
                exit();
            } else {
                $errorMessage = "There was an error during doctor registration. Please try again.";
            }

            $stmt->close();
        } else {
            $errorMessage = "Image upload failed.";
        }
    }
}
?>
