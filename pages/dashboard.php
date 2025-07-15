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
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<h2>No messages received yet.</h2>";
}
?>
