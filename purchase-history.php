<?php
session_start();
include "includes/db.php";
include "includes/header.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_id DESC";
$result = mysqli_query($conn, $sql);
?>

<h2 style="text-align:center;">Purchase History</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>Total</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    <?php while ($order = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $order['order_id']; ?></td>
            <td>Rs. <?php echo $order['total_amount']; ?></td>
            <td><?php echo $order['order_status']; ?></td>
            <td><?php echo $order['created_at']; ?></td>
        </tr>
    <?php } ?>
</table>

<?php include "includes/footer.php"; ?>