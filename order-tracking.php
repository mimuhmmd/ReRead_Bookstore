<?php
session_start();
include "includes/db.php";
include "includes/header.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<form method="GET">
    <h2>Track Order</h2>
    <input type="number" name="order_id" placeholder="Enter Order ID" required>
    <button type="submit">Track</button>
</form>

<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM orders WHERE order_id='$order_id' AND user_id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $order = mysqli_fetch_assoc($result);

        echo "<div class='container'>";
        echo "<h3>Order ID: " . $order['order_id'] . "</h3>";
        echo "<p>Status: " . $order['order_status'] . "</p>";
        echo "<p>Total: Rs. " . $order['total_amount'] . "</p>";
        echo "</div>";
    } else {
        echo "<p style='text-align:center;'>Order not found.</p>";
    }
}
?>

<?php include "includes/footer.php"; ?>