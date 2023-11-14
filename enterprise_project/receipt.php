<?php

@include 'config.php';
error_reporting(0);
$userid=$_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Receipt</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/stylesheet2.css">
   <link rel="stylesheet" href="css/homepage.css"/>
   <link rel="stylesheet" href="css/style.css"/>

</head>
<body>


<header>
   
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="loginhomepage.php" class="active">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="#">Classes</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a>
            <?php   
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
         ?>
            <a href="cart.php" class="fa fa-shopping-cart"><span><?php echo $row_count; ?></span></a>
            
        </nav>
    </header>


    <div class="display-order">
        <h3>Your Order</h3>
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE username='$user_id'");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span> Subject: <?= $fetch_cart['name']; ?> | Quantity: <?= $fetch_cart['quantity']; ?> | Price: RM <?= $fetch_cart['price']* $fetch_cart['quantity']; ?></span>
      
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Grand Total : RM <?= $grand_total; ?> </span>
      
   </div>
   <a href="checkout.php" class="btn" style="margin-top: 0;">Back</a>

   <?php include 'footer.php'; ?>

    <script src="main.js"></script>

</body>
</html>