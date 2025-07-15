<?php
session_start();
// Connect the database
require '../Database/db.php';
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
        $_SESSION['logged_in'] = true;

        header("Location: ../pages/dashboard.php");
        exit();
    } else {
        echo "<script>alert('Wrong Password'); window.location.href='../pages/login.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Admin not found'); window.location.href='../pages/login.php';</script>";;
}
?>

