<?php

@include 'config.php';
$userid = $_SESSION['userid'];

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
    $product_id = $_POST['classID'];

    // Fetch the username from the user database
    $get_username_query = mysqli_query($conn, "SELECT username FROM user WHERE userid = '$userid'");
    $user_data = mysqli_fetch_assoc($get_username_query);
    $username = $user_data['username'];

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND userid='$userid'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity, userid, username, classID) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity', '$userid', '$username', '$product_id')");
        $message[] = 'product added to cart successfully';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   
   <title>Class List</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="CSS/stylesheet2.css">
   <link rel="stylesheet" href="CSS/style.css"/>
</head>
<body>





<header>
   
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="loginhomepage.php">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="classlist.php"class="active">Classes</a>
            <a href="history.php">History</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a>
            <?php   
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`WHERE userid='$userid'") or die('query failed');
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


<div class="container">

<section class="products">

   <h1 class="heading mt-4">Class List</h1>
   <hr>
   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM class WHERE quantity>0");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="image/<?php echo $fetch_product['image']; ?>" alt="" >
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">RM <?php echo $fetch_product['price']; ?></div>
            <div class="price">Quantity: <?php echo $fetch_product['quantity']; ?></div>
            <div class="price">Time: <?php echo $fetch_product['time']; ?></div>
            <input type="hidden" name="classID" value="<?php echo $fetch_product['classID']; ?>">
            <input type="hidden" name="product_quantity" value="<?php echo $fetch_product['quantity']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_time" value="<?php echo $fetch_product['time']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<?php include 'footer.php'; ?>

<script src="main.js"></script>
</body>
</html>
