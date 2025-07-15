<?php
include "../includes/header.php";

require "../Database/db.php";

// Get message by ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM contact_messages WHERE id = $id");
$row = $result->fetch_assoc();
?>

<div class="d-flex flex-column align-items-center">
    <h2 class="mt-5">Edit Message</h2>
    <form class="form_control d-flex justify-content-center align-items-center flex-column border p-4 rounded shadow mt-4" action="../Process/update.php" , method="post" style="width:500px">
        <div class="mb-3 w-100">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>" required placeholder="Enter Username">
        </div>
        <div class="mb-3 w-100">
            <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" required placeholder="name@example.com">
        </div>
        <div class="mb-3 w-100">
            <textarea name="message" class="form-control" required><?= $row['message'] ?></textarea><br>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

