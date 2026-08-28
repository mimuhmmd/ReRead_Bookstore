<?php
include "includes/db.php";
include "includes/header.php";

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>

<div class="container">
    <section id="home" class="page">
        <div class="intro-bar">
          <h2>AVAILABLE BOOKS</h2>
        </div>

    <input type="text" id="searchBox" placeholder="Search books by title">

    <div id="bookResults" class="book-grid">
        <?php while ($book = mysqli_fetch_assoc($result)) { ?>
            <div class="book-card">
                <img src="images/<?php echo $book['image']; ?>" alt="Book Image">
                <h3><?php echo $book['title']; ?></h3>
                <p>Author: <?php echo $book['author']; ?></p>
                <p>Category: <?php echo $book['category']; ?></p>
                <p>Rs. <?php echo $book['price']; ?></p>

                <a class="btn" href="product-details.php?id=<?php echo $book['book_id']; ?>">
                    View Details
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<script src="js/script.js"></script>

<?php include "includes/footer.php"; ?>