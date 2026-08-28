<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['add'])) {
    $book_id = $_GET['add'];

    $check = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id' AND book_id='$book_id'");

    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE user_id='$user_id' AND book_id='$book_id'");
    } else {
        mysqli_query($conn, "INSERT INTO cart (user_id, book_id, quantity) VALUES ('$user_id', '$book_id', 1)");
    }

    header("Location: cart.php");
    exit();
}

if (isset($_GET['remove'])) {
    $cart_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart WHERE cart_id='$cart_id' AND user_id='$user_id'");
    header("Location: cart.php");
    exit();
}

include "includes/header.php";

$sql = "SELECT cart.cart_id, cart.quantity, books.title, books.price
        FROM cart
        JOIN books ON cart.book_id = books.book_id
        WHERE cart.user_id='$user_id'";

$result = mysqli_query($conn, $sql);
$total = 0;
?>

<h2 style="text-align:center;">My Cart</h2>

<table>
    <tr>
        <th>Book</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Action</th>
    </tr>

    <?php while ($item = mysqli_fetch_assoc($result)) { 
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
    ?>
        <tr>
            <td><?php echo $item['title']; ?></td>
            <td>Rs. <?php echo $item['price']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>Rs. <?php echo $subtotal; ?></td>
            <td>
                <a href="cart.php?remove=<?php echo $item['cart_id']; ?>">Remove</a>
            </td>
        </tr>
    <?php } ?>

    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td colspan="2"><strong>Rs. <?php echo $total; ?></strong></td>
    </tr>
</table>

<div style="text-align:center;">
    <a class="btn" href="checkout.php">Checkout</a>
</div>

<?php include "includes/footer.php"; ?>