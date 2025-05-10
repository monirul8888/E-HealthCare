<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pName = $_POST['pName'];
    $pEmail = $_POST['pEmail'];
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    $uploadDir = __DIR__ . '/uploads/'; // Absolute path to the uploads folder
    $filePath = $uploadDir . basename($fileName);

    // Ensure uploads folder exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create uploads folder with permissions
    }

    // Move file to the uploads folder
    if ($fileError === 0) {
        if (move_uploaded_file($fileTmpName, $filePath)) {
            echo "File uploaded successfully: " . htmlspecialchars($filePath);
            // Save file path to the database
            $stmt = $connection->prepare("INSERT INTO patients1 (pName, pEmail, file) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $pName, $pEmail, $filePath);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "File upload error: $fileError";
    }
}
?>


<!-- HTML form for patient registration -->
<div class="form">
    <form action="in.php" method="post" enctype="multipart/form-data">
        <h2>Patient Registration Form</h2>
        <table>
            <tr>
                <th>
                    <label for="name">Enter Your Name</label>
                </th>
                <td>
                    <input type="text" name="pName" id="pName" placeholder="Enter Your Name" required>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="pEmail">Enter Email</label>
                </th>
                <td>
                    <input type="email" name="pEmail" id="pEmail" placeholder="Enter Your Email" required>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="pNumber">Mobile Number</label>
                </th>
                <td>
                    <input type="tel" name="pNumber" id="pNumber" placeholder="Enter Your Mobile Number" required>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="date">Date of Birth</label>
                </th>
                <td>
                    <input type="date" name="date" id="date" required>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="gender">Gender</label>
                </th>
                <td>
                    <input type="radio" name="gender" value="male" id="male" required>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" value="female" id="female" required>
                    <label for="female">Female</label>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="history">Medical History</label>
                </th>
                <td>
                    <label for="Hypertension">Hypertension</label>
                    <input type="checkbox" name="history[]" value="Hypertension" id="Hypertension">
                    <label for="diabetes">Diabetes</label>
                    <input type="checkbox" name="history[]" value="Diabetes" id="diabetes">
                    <label for="Allergies">Allergies</label>
                    <input type="checkbox" name="history[]" value="Allergies" id="Allergies">
                    <label for="other">Other</label>
                    <input type="checkbox" name="history[]" value="Other" id="other">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="department">Select Your Concern</label>
                </th>
                <td>
                    <select name="department" id="department" required>
                        <option value="" disabled selected>Select Your Concern</option>
                        <option value="General Health">General Health</option>
                        <option value="Heart Problems">Heart Problems</option>
                        <option value="Children's Health">Children's Health</option>
                        <option value="Bone & Joint Issues">Bone & Joint Issues</option>
                        <option value="Brain & Nerve Issues">Brain & Nerve Issues</option>
                        <option value="Pregnancy & Women's Health">Pregnancy & Women's Health</option>
                        <option value="Skin Conditions">Skin Conditions</option>
                        <option value="Mental Health">Mental Health</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="address">Home Address</label>
                </th>
                <td>
                    <textarea name="address" id="address" rows="5" cols="30" placeholder="Street Address, City, ZIP Code"></textarea>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <label for="file">Attach The Previous Prescription, If Any.</label>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="file" name="file" id="file" accept=".pdf,.doc,.docx">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="pPassword">Enter Password</label>
                </th>
                <td>
                    <input type="password" name="pPassword" id="pPassword" placeholder="Enter Password" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Submit">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</div>
