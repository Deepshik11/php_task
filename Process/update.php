<?php
require '../Database/db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "UPDATE contact_messages SET name=?, email=?, message=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $email, $message, $id);
$stmt->execute();

header("Location: ../pages/dashboard.php");
?>
