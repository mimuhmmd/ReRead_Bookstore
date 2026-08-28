<?php
$conn = mysqli_connect("localhost", "root", "", "reread_bookstore");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>