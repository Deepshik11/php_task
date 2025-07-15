<?php
require '../Database/db.php';

$id = $_GET['id'];
$sql = "DELETE FROM contact_messages WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../pages/dashboard.php");
?>
