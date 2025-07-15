<?php
$conn = new mysqli("localhost", "root", "", "task");

// Get message by ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM contact_messages WHERE id = $id");
$row = $result->fetch_assoc();
?>

<h2>Edit Message</h2>
<form method="POST" action="update.php">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">
  <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
  <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
  <textarea name="message" required><?= $row['message'] ?></textarea><br>
  <button type="submit">Update</button>
</form>
