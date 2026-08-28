<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <h1>Manage Users</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="../logout.php">Logout</a>
    </nav>
</header>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
    </tr>

    <?php while ($user = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $user['user_id']; ?></td>
            <td><?php echo $user['full_name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role']; ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>