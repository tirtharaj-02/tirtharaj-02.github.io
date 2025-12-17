<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli(
    "127.0.0.1",
    "root",
    "",
    "portfolio",
    3307
);

// Get POST data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

if (!$name || !$email || !$subject || !$message) {
    echo "Missing data";
    exit;
}

$stmt = $conn->prepare(
    "INSERT INTO quickinfo (name, email, subject, message)
     VALUES (?, ?, ?, ?)"
);

$stmt->bind_param("ssss", $name, $email, $subject, $message);
$stmt->execute();

echo "SUCCESS";

$stmt->close();
$conn->close();
?>
