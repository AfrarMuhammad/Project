<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; 
$username = "root";
$password = "root";
$dbname = "Jewllery";
$port = 3307; 

$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $username = trim($_POST["username"] ?? '');
    $phoneno = trim($_POST["phoneno"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');
    $confirm_password = trim($_POST["confirm_password"] ?? '');

   
    if (empty($username) || empty($phoneno) || empty($email) || empty($password) || empty($confirm_password)) {
        die("<script>alert('All fields are required!'); window.location.href='signup.php';</script>");
    }

   
    if (!preg_match("/^[0-9]{10,15}$/", $phoneno)) {
        die("<script>alert('Invalid phone number! Must be 10-15 digits.'); window.location.href='signup.php';</script>");
    }

    if ($password !== $confirm_password) {
        die("<script>alert('Passwords do not match!'); window.location.href='signup.php';</script>");
    }

  
    $stmt = $conn->prepare("INSERT INTO user (username, phoneno, email, password, confirm_password) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("sssss", $username, $phoneno, $email, $password, $confirm_password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
    } else {
        die("SQL Execution Error: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>