<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM books WHERE book_id='$id'");

header("Location: manage-products.php");
exit();
?>