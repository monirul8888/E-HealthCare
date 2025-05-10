<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$pass = "";
$db = "HealthCare";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed."]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender = $_POST['sender_name'] ?? '';
    $message = $_POST['message_text'] ?? '';

    if ($sender && $message) {
        $stmt = $conn->prepare("INSERT INTO messages (sender_name, message_text) VALUES (?, ?)");
        $stmt->bind_param("ss", $sender, $message);
        $success = $stmt->execute();
        $stmt->close();
        echo json_encode(["success" => $success]);
    } else {
        echo json_encode(["success" => false, "error" => "Empty name or message."]);
    }
    exit;
}

// If GET request, return messages
$result = $conn->query("SELECT sender_name, message_text, created_at FROM messages ORDER BY created_at ASC");
$messages = [];

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);
?>
