<?php
include 'includes/db.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm) {
        echo "<p style='color:red; text-align:center;'>Passwords do not match!</p>";
    } else {
        
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (full_name, email, password) VALUES ('$name', '$email', '$hashed')";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit();
        } else {
            echo "<p style='color:red; text-align:center;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>



<button name="register">
Register
</button>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="register">
  <h2>Register for an Account</h2>

  <!-- IMPORTANT: method, action, and name attributes -->
  <form method="POST" action="register.php">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required placeholder="John Doe">

    <label for="Email">Email</label>
    <input type="email" id="Email" name="email" required placeholder="john@example.com">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" minlength="6" required placeholder="Password">

    <label for="confirm-password">Confirm Password</label>
    <input type="password" id="confirm-password" name="confirm_password" minlength="6" required placeholder="Confirm Password">

    <label for="terms">
      <input type="checkbox" id="terms" required>
      I agree to the <a href="terms.html" target="_blank">Terms and Conditions</a>
    </label>

    <button type="submit" name="register">Register</button>

    <div class="login-text">
      Already have an account? <a href="login.php">Login</a>
    </div>
  </form>
</div>

</body>
</html>