<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php"); 
    exit();
}
?>

<?php 
    $page_title = "admin dashboard";
    include '../includes/header.php';
?>

<h1 class="text-center mt-5">Admin Dashboard</h1>
<?php
$conn = new mysqli("localhost", "root", "", "task");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM contact_messages");

if ($result && $result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
              <th>Name</th><th>Email</th><th>Message</th><th>Actions</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['message']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'style='color: black; text-decoration: none;'>Edit</a> |
                    <a href='delete.php?id={$row['id']}' style='color: red;  text-decoration: none;'>Delete</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<h5>No messages received yet.</h5>";
}
?>

<?php include '../includes/footer.php'; ?>