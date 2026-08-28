<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <h1>Manage Products</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="add-product.php">Add Product</a>
        <a href="../logout.php">Logout</a>
    </nav>
</header>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>

    <?php while ($book = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $book['book_id']; ?></td>
            <td><?php echo $book['title']; ?></td>
            <td>Rs. <?php echo $book['price']; ?></td>
            <td><?php echo $book['stock']; ?></td>
            <td>
                <a href="delete-product.php?id=<?php echo $book['book_id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>