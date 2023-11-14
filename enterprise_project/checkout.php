<?php

@include 'config.php';

$userid=$_SESSION['userid'];
if(isset($_POST['order_btn'])){

 

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   
}

if(isset($_POST['reduce_qty'])){

    {
   $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE username='$userid'");
  
 
    while ($cart_row = mysqli_fetch_assoc($select_cart)) {
        $quantity = $cart_row['quantity'];
        $classID = $cart_row['classID'];
        $price = $cart_row['price'];
        $total_price = number_format($price*$quantity);
        $username = $cart_row['username'];
        $productname = $cart_row['name'];
 
        $insert_product = mysqli_query($conn, "INSERT INTO sales(productname, price,quantity,total,userid) VALUES('$productname', '$price', '$quantity', '$total_price','$username')");
 
 
       $query = "UPDATE class SET quantity = quantity - $quantity WHERE classID = $classID";
       $upload = mysqli_query($conn, $query);
       header('location:receipt.php');
    }
 
 
 
 
 
 
     }   }




?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout Page</title>

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
    

    <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
    

    <div class="display-order">
    
      <h3>Your Order</h3>
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE username='$userid'");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span> | <?= $fetch_cart['name']; ?> | Quantity: <?= $fetch_cart['quantity']; ?> | RM <?= $fetch_cart['price']* $fetch_cart['quantity']; ?> | </span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Grand Total : RM <?= $grand_total; ?> </span>
   </div>

   <form action="" method="post">
<p align="right"> <button class="btn"  name="reduce_qty"> Place order </p></button>
<p align="left"><a href="cart.php" class="btn" > Back </a></p>
</form>

<?php include 'footer.php'; ?>

   <script src="main.js"></script>
</body>



</html>