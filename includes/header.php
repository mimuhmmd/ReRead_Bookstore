<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Buy Used books</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header>
      <div class="Top">
        <div class="logo">
          <h1>ReRead.</h1>
        </div>
        <div class="Searchbar">
          <input class="search" type="text" placeholder="Search">
          <img src="images/download-1 copy.png" width="20" height="20" alt="Search icon" class="searchicon">
        </div class="header-icons">
          <div class="Account">
            <a href="profile.php">
              <img src="images/Account.png" width="40"  alt="account" class="account-icon">
            </a>  
          </div>
          <div class="Cart">
            <a href="cart.php">
            <img src="images/cart.png" width="40" alt="Cart" class="cart-icon">
          </a>
        </div>
        </div>
        <div class="Top-options">
 
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="logout.php" style="color:#b02e2e;" >Sign out</a>

        </div>
      </div> 


    </header>