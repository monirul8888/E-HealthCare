<?php
include 'connect.php';

$sql = "SELECT pName, pEmail, file FROM patients1";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Uploaded File</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        // Get the file path stored in the database
        $filePath = $row['file'];

        // Generate the full URL to access the file
        $fileUrl = 'http://localhost/E-healthcare/uploads/' . basename($filePath);

        echo "<tr>
                <td>" . htmlspecialchars($row['pName']) . "</td>
                <td>" . htmlspecialchars($row['pEmail']) . "</td>
                <td><a href='" . $fileUrl . "' target='_blank'>View PDF</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
?>
