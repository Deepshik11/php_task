<?php
require '../Database/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Message sent successfully!'); window.location.href='../index.php';</script>";
    exit();
} else {
    echo "<script>alert('Failed to send message'); window.location.href='../index.php';</script>";
    exit();
}
?>
