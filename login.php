<?php
session_start();
include "includes/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password, role FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Store session data
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] === 'admin') {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: index.php"); // normal customer homepage
            }
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No account found with that email.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="login">
    <h2>Login to your Account</h2>

    <form method="POST" action="login.php">
        <label for="Email">Email</label>
        <input type="email" name="email" id="Email" required placeholder="john@example.com">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" minlength="6" required placeholder="Password">

        <button type="submit" name="login">Login</button>

        <div class="register-text">
            Don't have an account? 
            <a href="register.php">Create Account</a>
        </div>
        <div class="home-page">
            <a href="index.php">Go Back</a>
        </div>
    </form>
</div>

</body>
</html>