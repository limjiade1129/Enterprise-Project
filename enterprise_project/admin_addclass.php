<?php
@include 'config.php';
session_start();

if(isset($_POST['add_product'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'image/'.$product_image;


    $select = " SELECT * FROM class WHERE name = '$product_name'";

    $result = mysqli_query($conn, $select);
    

    if(empty($product_name) || empty($product_price) || empty($product_image) || empty($product_quantity)){
        $message[]='Please fill out all';

    }else{
        if(mysqli_num_rows($result) > 0){
    
            $message[] = 'product already exist!';
         }
    else{
        $insert="INSERT INTO class(name,price,quantity,image) VALUES('$product_name','$product_price','$product_quantity','$product_image')";
        $upload= mysqli_query($conn,$insert);
        if($upload){
            move_uploaded_file($product_image_tmp_name,$product_image_folder);
            $message[]='Class successfully added';
        }else{
            $message[]='Product could not be added';
        }
    }
    }

};
if(isset($_GET['delete'])){
    $classID =$_GET['delete'];
    mysqli_query($conn,"DELETE FROM class WHERE classID=$classID");
    header('location:admin_addclass.php');
}



?>


<!DOCTYPE html>
<html lang="en">
    <head>
   
        <meta charset="uft-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href=css/stylesheet.css />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
        <body>
        <header>
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="loginpage.php">Classes</a>
            <a href="loginpage.php">About Us</a>
            <a href="loginpage.php">Profile</a>
            <a href="loginpage.php"class="active">Login</a>
            <a href="registerpage.php">Sign Up</a>
        </nav>
    </header>
 <?php
if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}
 ?>

    <div class="container-1">
    <div class="admin-product-form-container">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" >
    <h3>Add New Class</h3>
    <input type="text" placeholder="enter class name" name="product_name" class="box">
    <input type="number" placeholder="enter price" name="product_price" class="box">
    <input type="number" placeholder="enter quantity" name="product_quantity" class="box">
    <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
    <input type="submit" class="btn-1" name="add_product" value="ADD CLASS">
</form>
    


    </div>
    <?php
    $select = mysqli_query($conn, "SELECT * FROM class");
   
    ?>
    <div class="product-display">
       <table class="product-display-table">
          <thead>
          <tr>
             <th>Class Image</th>
             <th>Class Name</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Action</th>
          </tr>
          </thead>
          <?php while($row = mysqli_fetch_assoc($select)){ ?>
          <tr>
             <td><img src="image/<?php echo $row['image']; ?>" height="100" alt=""></td>
             <td><?php echo $row['name']; ?></td>
             <td>RM <?php echo $row['price']; ?></td>
             <td><?php echo $row['quantity'];?></td>
            
             <td>
                <a href="admin_update.php?edit=<?php echo $row['classID']; ?>" class="btn"> <i class="fas fa-edit"></i> EDIT </a>
                <a href="admin_addclass.php?delete=<?php echo $row['classID']; ?>" class="btn"> <i class="fas fa-trash"></i> DELETE </a>
             </td>
          </tr>
       <?php } ?>

    </table>


</div>

    </div>    

    <script src="main.js"></script>
    
</body>
</html>