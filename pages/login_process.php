<?php
session_start();
// Connect the database
$conn = new mysqli("localhost", "root", "", "task");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Get the data from the login.php
$username = $_POST['username'];
$password = $_POST['password'];
// Fetch admin details from database
$sql = "SELECT * FROM admin_user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

//Check if admin exists
if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();
    if (password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Wrong Password'); window.location.href='login.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Admin not found'); window.location.href='login.php';</script>";;
}
?>
