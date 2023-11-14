<?php

@include 'config.php';

$classID = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity = $_POST['product_quantity'];
   
   
 
   if(empty($product_name) || empty($product_price) ||  empty($product_quantity)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE class SET name='$product_name',price='$product_price',quantity='$product_quantity'
        WHERE classID = '$classID'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin_addclass.php');
      }else{
         $$message[] = 'Please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href=css/stylesheet.css />
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM class WHERE classID='$classID'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Update Class</h3>
      Name: <input type="text" class="box" name="product_name" value="<?php echo $row['name']; ?>" placeholder="enter the product name">
      Price: <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
      Quantity: <input type="number" min="0" class="box" name="product_quantity" value="<?php echo $row['quantity']; ?>" placeholder="enter the product quantity">
      
      <input type="submit" value="UPDATE" name="update_product" class="btn">
      <a href="admin_addclass.php" class="btn">Back</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>