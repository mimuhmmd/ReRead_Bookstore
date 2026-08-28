<?php
include "includes/db.php";
include "includes/header.php";

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE book_id='$id'";
$result = mysqli_query($conn, $sql);
$book = mysqli_fetch_assoc($result);
?>

<div class="container">
    <h2><?php echo $book['title']; ?></h2>

    <img src="images/<?php echo $book['image']; ?>" width="200">

    <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
    <p><strong>Category:</strong> <?php echo $book['category']; ?></p>
    <p><strong>Description:</strong> <?php echo $book['description']; ?></p>
    <p><strong>Price:</strong> Rs. <?php echo $book['price']; ?></p>
    <p><strong>Stock:</strong> <?php echo $book['stock']; ?></p>

    <a class="btn" href="cart.php?add=<?php echo $book['book_id']; ?>">Add to Cart</a>
</div>

<?php include "includes/footer.php"; ?>