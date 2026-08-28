<?php
include "../includes/db.php";

$keyword = $_GET['keyword'];

$sql = "SELECT * FROM books 
        WHERE title LIKE '%$keyword%' 
        OR author LIKE '%$keyword%' 
        OR category LIKE '%$keyword%'";

$result = mysqli_query($conn, $sql);

while ($book = mysqli_fetch_assoc($result)) {
    echo "<div class='book-card'>";
    echo "<img src='images/" . $book['image'] . "'>";
    echo "<h3>" . $book['title'] . "</h3>";
    echo "<p>Author: " . $book['author'] . "</p>";
    echo "<p>Rs. " . $book['price'] . "</p>";
    echo "<a class='btn' href='product-details.php?id=" . $book['book_id'] . "'>View Details</a>";
    echo "</div>";
}
?>