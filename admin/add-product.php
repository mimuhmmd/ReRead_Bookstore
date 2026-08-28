<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../images/" . $image);

    $sql = "INSERT INTO books (title, author, category, description, price, image, stock)
            VALUES ('$title', '$author', '$category', '$description', '$price', '$image', '$stock')";

    mysqli_query($conn, $sql);

    header("Location: manage-products.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<form method="POST" enctype="multipart/form-data">
    <h2>Add Book</h2>

    <input type="text" name="title" placeholder="Book Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="text" name="category" placeholder="Category" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="number" name="price" placeholder="Price" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <input type="file" name="image" required>

    <button type="submit" name="add">Add Book</button>
</form>

</body>
</html>