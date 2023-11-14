<?php

@include 'config.php';

$userid=$_SESSION['userid'];
if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
  
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE username='$userid'");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart Page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Cart</h1>

   <table>

      <thead>
         <th></th>
         <th>Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total Price</th>
         <th></th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE username='$userid'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="image/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>RM <?php echo number_format($fetch_cart['price']); ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>RM <?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Delete</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><p align="left"><a href="classlist.php" class="btn" > Back </a></p></td>
            <td colspan="3">Grand Total</td>
            <td>RM <?php echo $grand_total; ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete All </a></td>
         </tr>

      </tbody>

   </table>
   


   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
   </div>

</section>

</div>

<?php include 'footer.php'; ?>
   
<!-- custom js file link  -->
<script src="main.js"></script>

</body>
</html>