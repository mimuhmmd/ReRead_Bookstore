<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="manage-products.php">Products</a>
        <a href="manage-users.php">Users</a>
        <a href="manage-orders.php">Orders</a>
        <a href="../index.php">Website</a>
        <a href="../logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Welcome Admin</h2>
    <p>Use this dashboard to manage books, users, and orders.</p>
</div>

</body>
</html>