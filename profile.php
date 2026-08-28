<?php
session_start();
include "includes/db.php";
include "includes/header.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<div class="container">
    <h2>My Profile</h2>
    <p><strong>Name:</strong> <?php echo $user['full_name']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
</div>

<?php include "includes/footer.php"; ?>