
<?php
include "includes/db.php";
include "includes/header.php";

?>



<!DOCTYPE html>
<html>
    <main>
        <link rel="stylesheet" href="css/style.css">
    <body>    




      <section id="home" class="page">
        <div class="intro-bar">
          <h2>All-Time Bestsellers</h2>
          <button class="more" onclick="window.location.href='products.php'">SEE MORE</button>
        </div>
        <div class="Sale-page">
            <?php
            $sql = "SELECT * FROM books ORDER BY created_at DESC LIMIT 5";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($book = mysqli_fetch_assoc($result)) {
                    ?><div class="book">
                        <img src="images/<?php echo $book['image']; ?>" alt="book image" class="image">
                        <h2 class="book-name"><?php echo $book['title']; ?></h2>
                        <p class="book-author"><?php echo $book['author']; ?></p>
                        <p class="book-price">Rs. <?php echo $book['price']; ?></p>
                        <a class="btn" href="cart.php?add=<?php echo $book['book_id']; ?>">Add to Cart</a>

                    </div>
                    <?php
                }
            } else {
                echo '<p>No books available.</p>';
            }
            ?>

        </div>
      </section>

    

    

    </main>
        

    

    
  </body>
</html>

<?php include "includes/footer.php"; ?>